<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreditCardRequest;
use App\Models\Card;
use App\Models\Category;
use App\Models\User;
use http\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Payment;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;


class CheckOutController extends Controller
{
    public function index(): View
    {
        $categories = Category::all()->where("is_active", true);
        $user = new User();
        return view("ui.credit_card.index", ["categories" => $categories, "user" => $user]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function checkOut(Request $request, CreditCardRequest $creditCardRequest): RedirectResponse
    {
        $name = $request->get("name");
        $surname = $request->get("surname");
        $card_no = $creditCardRequest->get("card_no");
        $month = $request->get("month");
        $year = $request->get("year");
        $cvv = $request->get("cvv");


        $number = (int)$card_no;

        //KULLANICIYI ÇEKME İŞLEMİ
        $user = Auth::user();

        //SEPETİ GETİR
        $card = $this->getOrCreateCard();

        //SEPETTEKİ ÜRÜNLERİN TOPLAMI
        $total = $this->calculaterCardTotal();

        //ÖDEME İSTEĞİ
        $request = new CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($card->card_id);
        $request->setPrice($total);
        $request->setPaidPrice($total);
        $request->setCurrency(Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId($card->code);
        $request->setPaymentChannel(PaymentChannel::WEB);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);

        //KREDİ KARTI BİLGİLERİ
        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName($name);
        $paymentCard->setCardNumber($number);
        $paymentCard->setExpireMonth($month);
        $paymentCard->setExpireYear($year);
        $paymentCard->setCvc($cvv);
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        //SATIN ALAN
        $buyer = new Buyer();
        $buyer->setId($user->user_id);
        $buyer->setName($user->name);
        $buyer->setSurname($user->surname);
        $buyer->setGsmNumber($user->phone);
        $buyer->setEmail($user->email);
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("İstanbul / Tuzla");
        $buyer->setIp(\request()->ip());
        $buyer->setCity("İstanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34950");
        $request->setBuyer($buyer);

        //KARGO ADRESİ
        $shippingAddress = new Address();
        $shippingAddress->setContactName($user->name);
        $shippingAddress->setCity("İstanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("İstanbul / Tuzla");
        $shippingAddress->setZipCode("34950");
        $request->setShippingAddress($shippingAddress);

        //FATURA ADRESİ
        $billingAddress = new Address();
        $billingAddress->setContactName($user->name);
        $billingAddress->setCity("İstanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("İstanbul / Tuzla");
        $billingAddress->setZipCode("34950");
        $request->setBillingAddress($billingAddress);

        //SEPETTEKİ ÜRÜNLER
        $basketItems = $this->getBasketItems();
        $request->setBasketItems($basketItems);

        //OPTIONS ÇEKME
        $options = new Options();
        $options->setApiKey("sandbox-mJxtvL1Ts8Kr6yWoILeQzUCxAOLH8muO");
        $options->setSecretKey("sandbox-5jXMAhh4gIuaJ6AeNxLNjs9G9nnwn7z1");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");

        //ÖDEME İŞLEMİ
        $payment = Payment::create($request, $options);

        if ($payment->getStatus() == "success") {
            return redirect()->back()->with('success', 'Tebrikler Ödemeniz Başarıyla Alınmıştır.');
        } else {
            return redirect()->back()->with('error', 'Ödeme Alınamadı.');
        }
    }

    private function getOrCreateCard(): Card
    {
        $user = Auth::user();
        $card = Card::firstOrCreate(
            ['user_id' => $user->user_id],
            ['code' => Str::random(8)]
        );
        return $card;
    }

    /**
     * @return float
     */
    private function calculaterCardTotal(): float
    {
        $total = 0;
        $card = $this->getOrCreateCard();
        $cardDetails = $card->details;

        foreach ($cardDetails as $detail) {
            $total += $detail->product->price * $detail->quantity;

        }

        return $total;
    }

    private function getBasketItems(): array
    {
        $basketItems = array();
        $card = $this->getOrCreateCard();
        $cardDetails = $card->details;

        foreach ($cardDetails as $detail) {
            $item = new BasketItem();
            $item->setId($detail->product->product_id);
            $item->setName($detail->product->name);
            $item->setCategory1($detail->product->category->name);
            $item->setItemType(BasketItemType::PHYSICAL);
            $item->setPrice($detail->product->price);

            for ($i = 0; $i < $detail->quantity; $i++) {
                array_push($basketItems, $item);
            }
        }

        return $basketItems;
    }
}
