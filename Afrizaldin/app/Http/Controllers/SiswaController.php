<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();

        return view('admin.mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.CreateSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'required' => ':attribute harus diisi dulu joo',
            'min' => ':attribute minimal :min karakkter ya joo',
            'max' => ':attribute maksimal :max karakter joo ',
            'numeric' =>  ':attribute isien angka joo ',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg.png',
            'size' => 'file yang diupload maksimal :size'
        ];

        $this->validate($request,[
            'nisn' => 'required|numeric|min:6',
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'foto' => 'required|mimes:jpg,jpeg,png.gif,svg',
            'about' => 'required|min:50'
            
        ],$messages);

        //ambil informasi file yang diupload
        $file = $request->file('foto');

        //rename + ambil nama file 
        $nama_file = time()."_".$file->getClientOriginalName();
        
        //proses upload
        $tujuan_upload ='./template/img';
        $file->move($tujuan_upload,$nama_file);

        //proses Insert Database
        Siswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'foto' => $nama_file,
            'about' => $request->about
        ]);

        return redirect('/mastersiswa');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        return view('admin.ShowSiswa', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('admin.EditSiswa', compact('data'));
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

            $messages=[
                'required' => ':attribute harus diisi dulu joo',
                'min' => ':attribute minimal :min karakkter ya joo',
                'max' => ':attribute maksimal :max karakter joo ',
                'numeric' =>  'attribute isien angka joo ',
                'mimes' => 'file :attribute harus bertipe jpg,jpeg.png',
                'size' => 'file yang diupload maksimal :size'
            ];
    
            $this->validate($request,[
                'nisn' => 'required|numeric|digits_between:6,12',
                'nama' => 'required|min:5|max:20',
                'jk' => 'required',
                'email' => 'required',
                'alamat' => 'required|min:5',
                'foto' => 'mimes:jpg,jpeg,png.gif,svg',
                'about' => 'required|min:50'
                
            ],$messages);
    

            if($request->foto !=''){
                //Dengan Ganti Foto

                //1.hapus foto lama 
                $siswa=Siswa::find($id);
                file::delete('/template/img/'.$siswa->foto);

                //2.ambil informasi file yang diupload
        $file = $request->file('foto');

        //3.rename + ambil nama file 
        $nama_file = time()."_".$file->getClientOriginalName();
        
        //4.proses upload
        $tujuan_upload ='./template/img';
        $file->move($tujuan_upload,$nama_file);

        //5.menyimpan ke database
                $siswa=Siswa::find($id);
                $siswa->nisn = $request->nisn;
                $siswa->nama = $request->nama;
                $siswa->jk = $request->jk;
                $siswa->email = $request->email;
                $siswa->alamat = $request->alamat;
                $siswa->about = $request->about;
                $siswa->foto = $nama_file;
                $siswa->save();
                return redirect ('mastersiswa');

                
            }else{
                //Tanpa Ganti Foto
                $siswa=Siswa::find($id);
                $siswa->nisn = $request->nisn;
                $siswa->nama = $request->nama;
                $siswa->jk = $request->jk;
                $siswa->email = $request->email;
                $siswa->alamat = $request->alamat;
                $siswa->about = $request->about;
                $siswa->save();
                return redirect ('mastersiswa');

            }
                

           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }
}
