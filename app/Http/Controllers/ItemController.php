<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function newItem(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'kecacatan' => 'required',
            'jumlah' => 'required|numeric',
            'gambar' => 'required|max:2048|mimes:jpg,jpeg,png'
        ]);

        $request->gambar->storeAs('public/gambar', $request->gambar->getClientOriginalName());
        
        $results = new Item();
        $results->nama = $request->nama;
        $results->jenis = $request->jenis;
        $results->kondisi = $request->kondisi;
        $results->keterangan = $request->keterangan;
        $results->kecacatan = $request->kecacatan;
        $results->jumlah = $request->jumlah;
        $results->gambar = $request->gambar->getClientOriginalName();
        $results->save();

        return redirect('/dashboard')->with(['status'=>"Berhasil menambahkan item"]);
    }

    public function showEdit(Item $item){
        return view('edit-item', ['item' => $item]);
    }


    public function updateItem(Request $request, Item $item){
        $input = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'kecacatan' => 'required',
            'jumlah' => 'required|numeric',
            'gambar' => 'required|max:2048|mimes:jpg,jpeg,png'
        ]);

        $input['gambar'] = $request->gambar->getClientOriginalName();
        $item->update($input);

        $request->gambar->storeAs('public/gambar', $request->gambar->getClientOriginalName());

        
        return redirect('/dashboard')->with(['status'=>"Item berhasil diupdate"]);
    }

    public function deleteItem(Item $item){
        $item->delete();
        return redirect('/dashboard')->with(['status'=>"Item berhasil dihapus"]);
    }
}
