<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand as ModelsBrand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Brand extends Component
{

    use WithPagination;
    public $name = '';
    public  $slug = '';
    public  $status = '';

    public $brand_id = 0;

    public $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function render()
    {

        $prands = ModelsBrand::paginate(5);


        return view('livewire.admin.brand.brand', ['prands' => $prands]);
    }

    public function delete($id)
    {
        try {



            $categorie = ModelsBrand::find($id);
            if ($categorie) {

                $categorie->delete();


                sweetalert()->addSuccess('Brand deleted Sucessfully');
            } else {
                flash()->addError("error click 2 Deleted please click one ");
            }
        } catch (\Exception $e) {

            flash()->addError("error click 2 Deleted please click one ");
        }
    }

    public function updatebrand()
    {
        $validatedData = $this->validate();

        ModelsBrand::where('id', $this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        $this->dispatchBrowserEvent('close', ['newName' => 'sjdfg']);
        $this->resetInput();
        flash()->addSuccess('Data Updated Sucessfully');
    }


    public function editbrand(int $brand_id)
    {
        $brand = ModelsBrand::find($brand_id);

        $this->brand_id == $brand_id;
        if ($brand) {

            $this->brand_id = $brand->id;
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->status = $brand->status == '1' ? true : false;
        } else {
            flash()->adderror("obse Error ");
        }
    }


    public function store()
    {
        $this->validate();
        try {

            ModelsBrand::create([

                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                'status' => $this->status == true ? '1' : '0',

            ]);
            $this->dispatchBrowserEvent('close', ['newName' => 'sjdfg']);
            $this->resetInput();
            flash()->addSuccess('Data Aded Sucessfully');
        } catch (\Exception $e) {

            flash()->adderror($e->getMessage());
        }
    }

    public function resetInput()
    {
        $this->name = '';
        $this->slug = '';
        $this->status = '';
    }
}
