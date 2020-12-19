<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = json_decode(Storage::get('deskripsi.json'));
        $desdata = array_reverse($data);
        return view('artikel', [
            'data' => $desdata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createartikel');
    }

    public function artikel()
    {
        return view('artikel');
    }

    public function beranda()
    {
        return view('beranda');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Storage::get('deskripsi.json');
        $decode = json_decode($data, true);
        array_push($decode, array(
            "title" => $request->input('title'),
            "datetime" => date('y - m - d H:i:s'),
            "author" => $request->input('author'),
            "content" => $request->input('content')
        ));
        Storage::put('deskripsi.json', json_encode($decode));

        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = json_decode(Storage::get('deskripsi.json'));

        abort_if(!isset($data[$id]), 404);

        return view('detail', [
            'id' => $id,
            'artikel' => $data[$id]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = json_decode(Storage::get('deskripsi.json'));

        abort_if(!isset($data[$id]), 404);

        return view('edit', [
            'id' => $id,
            'artikel' => $data[$id]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = json_decode(Storage::get('deskripsi.json'), true);

        abort_if(!isset($data[$id]), 404);

        $data[$id] = array_replace($data[$id], $request->except(['_method', '_token']));
        Storage::put('deskripsi.json', json_encode($data));

        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = json_decode(Storage::get('deskripsi.json'), true);

        abort_if(!isset($data[$id]), 404);

        array_splice($data, $id, 1);

        Storage::put('deskripsi.json', json_encode($data));

        return redirect('/artikel');
    }
}
// <?php

// namespace App\Http\Controllers;

// use Storage;
// use Illuminate\Http\Request;

// class PagesController extends Controller
// {
//   public function beranda()
//   {
//     return view('beranda');
//   }

//   public function index()
//   {
//     $data = Storage::disk('local')->get('artikel.json');
//     $dataartikel = json_decode($data, true);
//     return view('artikel')->with('dataartikel', $dataartikel);
//   }

//   public function buatdata(Request $request)
//   {
//     $input = $request->all();
//     dd($input);
//   }

//   public function artikel()
//   {
//     return view('artikel');
//   }

//   public function createartikel()
//   {
//     return view('createartikel');
//   }

//   public function Back()
//   {
//     return view('artikel');
//   }

//   public function updateartikel()
//   {
//     return view('updateartikel');
//   }

//   public function deksripsi()
//   {
//     return view('deskripsiartikel');
//   }
// }
