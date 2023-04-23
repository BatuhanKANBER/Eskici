<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        $faqs = Faq::all();
        return view("admin.faqs.index", ["faqs" => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view("admin.faqs.create_faqs");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FaqRequest $request
     * @return Response
     */
    public function store(FaqRequest $request): RedirectResponse
    {

        $question = $request->get("question");
        $answer = $request->get("answer");

        $faq = new Faq();
        $faq->question = $question;
        $faq->answer = $answer;
        $faq->save();

        return Redirect::to("/faqs");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq): View
    {
        return view("admin.faqs.edit_faqs", ["faq" => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FaqRequest $request
     * @param int $id
     * @return Response
     */
    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $question = $request->get("question");
        $answer = $request->get("answer");

        $faq->question = $question;
        $faq->answer = $answer;
        $faq->save();
        return Redirect::to("/faqs");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();
        return Redirect::to("/faqs");
    }
}
