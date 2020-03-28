<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faqs = Faq::with('user:id,name')->latest()->get();
        if ($request->ajax()) {
          return Datatables::of($faqs)
            ->addIndexColumn()
            ->make(true);
        }
        return view('pages.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = auth()->user();
        try {
            $admin->faqs()->create([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('faq.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);

        return view('pages.faq.edit', [
            'faq' => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        try {
            $faq->update([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('faq.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Faq::find($id)->delete();
        } catch (\Throwable $th) {
            return abort(404, $th);
        } finally {
            return redirect(route('faq.index'));
        }
    }
}
