<?php

namespace App\Http\Controllers;

use App\WebsiteContent;
use Illuminate\Http\Request;

class WebsiteContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $findContent = WebsiteContent::get();

        if($findContent->isEmpty()){
            $websiteContent = new WebsiteContent();

            $requests =  (object) $websiteContent->getDefaultValues();

            return view('operator/websiteManager.index', [
                    'request' => $requests,
                    'findContent' => $websiteContent
                ]);
        }else{
            $websiteContent = WebsiteContent::where('id',1)->first();

            $requests =  (object) $websiteContent;

            return view('operator/websiteManager.index', [
                        'findContent' => $websiteContent,
                        'request' => $requests
                    ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'logoDesa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sliderPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'sliderTextH1' => 'required',
            'sliderTextH2' => 'required',
            'visidesa' => 'required',
            'lokasiDesa' => 'required',
        ]);

        $logoDesa = $request->file('logoDesa');
        $sliderPhoto = $request->file('sliderPhoto');

        $logoDesaPictName = time()."_"."Logo-Desa-Sumerta-Kaja".".".$request->logoDesa->extension();
        $sliderPhotoPictName = time()."_"."Slider-Photo-Desa-Sumerta-Kaja".".".$request->sliderPhoto->extension();

        $logoDesa->move('images',$logoDesaPictName);
        $sliderPhoto->move('images',$sliderPhotoPictName);

        WebsiteContent::create([
            'visi' => $request->visidesa,
            'misi' => $request->misidesa,
            'lokasiDesa' => $request->lokasiDesa,
            'logoDesa' => $logoDesaPictName,
            'sliderPhoto' => $sliderPhotoPictName,
            'sliderTextH1' => $request->sliderTextH1,
            'sliderTextH2' => $request->sliderTextH2,
            'idUser' => \Auth::user()->id
        ]);

        return redirect('operator/manajer-website')->with('success', 'Konten Website Tersimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WebsiteContent  $websiteContent
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteContent $websiteContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WebsiteContent  $websiteContent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WebsiteContent  $websiteContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(($request->file('logoDesa') == null) && ($request->file('sliderPhoto') == null)){

            WebsiteContent::where('id',$id)
                ->update([
                'visi' => $request->visidesa,
                'misi' => $request->misidesa,
                'lokasiDesa' => $request->lokasiDesa,
                'logoDesa' => $request->logoDesaName,
                'sliderPhoto' => $request->sliderPhotoName,
                'sliderTextH1' => $request->sliderTextH1,
                'sliderTextH2' => $request->sliderTextH2,
                'idUser' => \Auth::user()->id
            ]);

            return redirect('operator/manajer-website')->with('success', 'Konten Website Berhasil Diperbaharui');

        }else if($request->file('logoDesa') == null){

            $sliderPhoto = $request->file('sliderPhoto');

            $sliderPhotoPictName = time()."_"."Slider-Photo-Desa-Sumerta-Kaja".".".$request->sliderPhoto->extension();

            $sliderPhoto->move('images',$sliderPhotoPictName);

            WebsiteContent::where('id',$id)
                ->update([
                'visi' => $request->visidesa,
                'misi' => $request->misidesa,
                'lokasiDesa' => $request->lokasiDesa,
                'logoDesa' => $request->logoDesaName,
                'sliderPhoto' => $sliderPhotoPictName,
                'sliderTextH1' => $request->sliderTextH1,
                'sliderTextH2' => $request->sliderTextH2,
                'idUser' => \Auth::user()->id
            ]);

            return redirect('operator/manajer-website')->with('success', 'Konten Website Berhasil Diperbaharui');

        }else if($request->file('sliderPhoto') == null){

            $logoDesa = $request->file('logoDesa');

            $logoDesaPictName = time()."_"."Logo-Desa-Sumerta-Kaja".".".$request->logoDesa->extension();

            $logoDesa->move('images',$logoDesaPictName);


            WebsiteContent::where('id',$id)
                ->update([
                'visi' => $request->visidesa,
                'misi' => $request->misidesa,
                'lokasiDesa' => $request->lokasiDesa,
                'logoDesa' => $logoDesaPictName,
                'sliderPhoto' => $request->sliderPhotoName,
                'sliderTextH1' => $request->sliderTextH1,
                'sliderTextH2' => $request->sliderTextH2,
                'idUser' => \Auth::user()->id
            ]);

            return redirect('operator/manajer-website')->with('success', 'Konten Website Berhasil Diperbaharui');

        }else{
            return redirect('operator/manajer-website')->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WebsiteContent  $websiteContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteContent $websiteContent)
    {
        //
    }
}
