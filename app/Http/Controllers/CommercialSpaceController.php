<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommercialSpace;
use App\Barangay;
use Cloudder;

class CommercialSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

        $barangays = Barangay::all();
        return view('pages.index')->with('barangays', $barangays);//
        //$s = $request->input('s');
        // return view('admin.commercialspacesearch');
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
        //TODO
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'image1' => 'image|nullable',
            'image2' => 'image|nullable',
            'image3' => 'image|nullable',
            'qty' => 'required|integer|min:1',
        ]);

        //Handle image uploading using Cloudinary.
        if($request->hasFile('image1'))
        {
            Cloudder::upload($request->file('image1')->path(), 'epwesto/properties/' . uniqid());
            $fileNameToStore1 = Cloudder::show(Cloudder::getPublicId());
        }
        if($request->hasFile('image2'))
        {
            Cloudder::upload($request->file('image2')->path(), 'epwesto/properties/' . uniqid());
            $fileNameToStore2 = Cloudder::show(Cloudder::getPublicId());
        }
        if($request->hasFile('image3'))
        {
            Cloudder::upload($request->file('image3')->path(), 'epwesto/properties/' . uniqid());
            $fileNameToStore3 = Cloudder::show(Cloudder::getPublicId());
        }
        

        $qty = $request->input('qty');

        for ($i = 0; $i < $qty; $i++)
        {
            $commercialspace = new CommercialSpace;
            $commercialspace->owner_id = auth()->user()->id;

            $commercialspace->p_category = $request->input('Property_category');

            switch($request->Property_category)
            {
                case "For Sale":
                    $commercialspace->p_type = $request->input('property_type-sale');
                    break;
                case "For Rent":
                    $commercialspace->p_type = $request->input('property_type-rent');
                    break;
                case "For Lease":
                    $commercialspace->p_type = $request->input('property_type-lease');
                    break;
            }

            $commercialspace->space_name = $request->input('namespace');
            $commercialspace->about_space = $request->input('aboutspace');
            $commercialspace->sqm = $request->input('sqm');
            $commercialspace->cr = $request->input('cr');

            // $commercialspace->barangay = $request->input('barangay');
            $commercialspace->barangay = Barangay::find($request->s)->id;
            // dd(Barangay::find($request->s)->id);

            $commercialspace->street = $request->input('street');
            $commercialspace->latitude = $request->input('lat');
            $commercialspace->longitude = $request->input('lng');
            $commercialspace->about_area = $request->input('aboutarea');
            $commercialspace->owner_name = $request->input('name');
            $commercialspace->email = $request->input('email');
            $commercialspace->mobile_no = $request->input('mobile');
            $commercialspace->tel_no = $request->input('tel');
            $commercialspace->price = $request->input('price');
            $commercialspace->type = $request->input('type');
            $commercialspace->status = $request->input('status');
            $commercialspace->image1 = $fileNameToStore1 ?? null;
            $commercialspace->image2 = $fileNameToStore2 ?? null;
            $commercialspace->image3 = $fileNameToStore3 ?? null;

            // return $commercialspace;
            $commercialspace->save();

        }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
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
        $this->validate($request, [
            'email' => 'required|string|email|max:255'
        ]);

        /* Handle file upload
        if($request->hasFile('image1')){
            // Get filename with the extension
            $filenameWithExt1 = $request->file('image1')->getClientOriginalName();
            // Get just filename
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // Get just ext
            $extension1 = $request->file('image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // Upload image
            $path1 = $request->file('image1')->storeAs('public/images', $fileNameToStore1);
        }

        if($request->hasFile('image2')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('image2')->getClientOriginalName();
            // Get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            // Upload image
            $path2 = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
        }

        if($request->hasFile('image3')){
            // Get filename with the extension
            $filenameWithExt3 = $request->file('image3')->getClientOriginalName();
            // Get just filename
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
            $extension3 = $request->file('image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            // Upload image
            $path3 = $request->file('image3')->storeAs('public/images', $fileNameToStore3);
        }
        */
        if($request->hasFile('image1'))
        {
            Cloudder::upload($request->file('image1')->path(), 'epwesto/properties/' . uniqid());
            $fileNameToStore1 = Cloudder::show(Cloudder::getPublicId());
        }
        if($request->hasFile('image2'))
        {
            Cloudder::upload($request->file('image2')->path(), 'epwesto/properties/' . uniqid());
            $fileNameToStore2 = Cloudder::show(Cloudder::getPublicId());
        }
        if($request->hasFile('image3'))
        {
            Cloudder::upload($request->file('image3')->path(), 'epwesto/properties/' . uniqid());
            $fileNameToStore3 = Cloudder::show(Cloudder::getPublicId());
        }

        $commercialspace = CommercialSpace::find($id); 

        $commercialspace->p_category = $request->input('Property_category');
        $commercialspace->p_type = $request->input('Property_type');

        $commercialspace->space_name = $request->input('namespace');
        $commercialspace->about_space = $request->input('aboutspace');
        $commercialspace->sqm = $request->input('sqm');
        $commercialspace->cr = $request->input('cr');
        $commercialspace->barangay = $request->input('barangay');
        $commercialspace->street = $request->input('street');
        $commercialspace->latitude = $request->input('lat');
        $commercialspace->longitude = $request->input('lng');
        $commercialspace->about_area = $request->input('aboutarea');
        $commercialspace->owner_name = $request->input('name');
        $commercialspace->email = $request->input('email');
        $commercialspace->mobile_no = $request->input('mobile');
        $commercialspace->tel_no = $request->input('tel');
        $commercialspace->price = $request->input('price');
        $commercialspace->type = $request->input('type');
        $commercialspace->status = $request->input('status');
        if($request->hasFile('image1')){
            $commercialspace->image1 = $fileNameToStore1;
        }
        if($request->hasFile('image2')){
            $commercialspace->image2 = $fileNameToStore2;
        }
        if($request->hasFile('image3')){
            $commercialspace->image3 = $fileNameToStore3;
        }
        $commercialspace->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $commercialspace = CommercialSpace::find($id);
        $commercialspace->delete();
        return redirect('/home');
    }
}
