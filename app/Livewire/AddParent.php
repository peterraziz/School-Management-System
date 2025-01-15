<?php

namespace App\Livewire;

use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads; // For uploading Photos
    
    public $successMessage = ''; 
    
    public $catchError, $updateMode = false, $photos,$show_table = true, $Parent_id, $id;
    
    public $currentStep = 1,
    
        // Father_INPUTS
        $email, $password,
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,
    
        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [ //if i wanna validate all Inputs: $this->validate([$propertyName]); 
            'email' => 'required|email',    
            'password' => 'required|string|min:6',    
            'National_ID_Father' => 'required|string|min:14|max:14|regex:/[0-9]{9}/',
            // 'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11', 
            'National_ID_Mother' => 'required|string|min:14|max:14|regex:/[0-9]{9}/',
            // 'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        ]);
    }

//==========         OR        ===========

    // public $successMessage = '';    

    // public $catchError,$updateMode = false ,$photos,$show_table = true,$Parent_id;

    
    // public $currentStep = 1,

    // // Father_INPUTS
    // #[Validate('required|email')]
    // public $email;

    // #[Validate('required|min:6')]
    // public $password;

    // public $Name_Father;
    // public $Name_Father_en;

    // #[Validate('required|string|min:14|max:14|regex:/[0-9]{9}/')]
    // public $National_ID_Father;

    // public $Passport_ID_Father;

    // #[Validate('regex:/^([0-9\s\-\+\(\)]*)$/|min:10')]
    // public $Phone_Father;

    // public $Job_Father;
    // public $Job_Father_en;
    // public $Nationality_Father_id;
    // public $Blood_Type_Father_id;
    // public $Address_Father;
    // public $Religion_Father_id;

    // // Mother_INPUTS
    // public $Name_Mother;
    // public $Name_Mother_en;

    // #[Validate('required|string|min:10|max:10|regex:/[0-9]{9}/')]
    // public $National_ID_Mother;

    // public $Passport_ID_Mother;

    // #[Validate('regex:/^([0-9\s\-\+\(\)]*)$/|min:10')]
    // public $Phone_Mother;

    // public $Job_Mother;
    // public $Job_Mother_en;
    // public $Nationality_Mother_id;
    // public $Blood_Type_Mother_id;
    // public $Address_Mother;
    // public $Religion_Mother_id;

    // public function rules()
    // {
    //     return [
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //         'National_ID_Father' => 'required|string|min:14|max:14|regex:/[0-9]{9}/',
    //         'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //         'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
    //         'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //     ];
    // }

    // public function save()
    // {
    //     $validatedData = $this->validate();

    //     // Save the validated data...
    // }
//---------------------------------------------------------------
    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all(),
            'my_parents'=> My_Parent::all(),
        ]);
    }


    public function showformadd()
    {
        $this->show_table = false;
    }

    //firstStepSubmit  -Father -
    public function firstStepSubmit()
    {

        $this->validate([
            'email' => 'required|unique:my__parents,email,'.$this->id,
            // 'email' => 'required|unique:my__parents,email,',//.$this->id,
            'password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            // 'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,'. $this->id,
            // 'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' ,//. $this->id,
            // 'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'Nationality_Father_id' => 'required',
            // 'Blood_Type_Father_id' => 'required',
            // 'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit  - Mother -
    public function secondStepSubmit()
    {

        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
            // 'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,',//. $this->id,
            // 'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            // 'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            // 'Blood_Type_Mother_id' => 'required',
            // 'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm(){
        try {
            $My_Parent = new My_Parent();

            // Father_INPUTS
            $My_Parent->email = $this->email;   // $this-> same way as: $request->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->National_ID_Father = $this->National_ID_Father;
            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->Phone_Father = $this->Phone_Father;
            $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
            $My_Parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
            $My_Parent->Religion_Father_id = $this->Religion_Father_id;
            $My_Parent->Address_Father = $this->Address_Father;

            // Mother_INPUTS
            $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->Phone_Mother = $this->Phone_Mother;
            $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $My_Parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
            $My_Parent->Address_Mother = $this->Address_Mother;

            $My_Parent->save();

            if (!empty($this->photos)){ // Cause i can submit it empty
                foreach ($this->photos as $photo) {
                    //To save it in a new Folder named 'National_ID_Father' that in the database'
                    $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachments'); // look in file 'filesystems.php'
                    // The Model
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => My_Parent::latest()->first()->id,
                    ]);
                }
            }

            $this->successMessage = (trans('messages.success'));
            toastr()->success('messages.success');
            $this->clearForm(); // After Submiting the form Clear it "Method clearForm",
            $this->currentStep = 1; // and take me back to the first page
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
        // catch (\Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // };
    }


    public function edit($id)
    {
        // dd($id);
        // dd('Edit method called with ID:', $id);
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = My_Parent::where('id',$id)->first();
        $this->Parent_id = $id;
        $this->email = $My_Parent->email;
        $this->password = $My_Parent->password;
        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father =$My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $My_Parent->Blood_Type_Father_id;
        $this->Address_Father =$My_Parent->Address_Father;
        $this->Religion_Father_id =$My_Parent->Religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Mother', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $My_Parent->Blood_Type_Mother_id;
        $this->Address_Mother =$My_Parent->Address_Mother;
        $this->Religion_Mother_id =$My_Parent->Religion_Mother_id;
    }

    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function submitForm_edit(){
        
        if ($this->Parent_id){
            $parent = My_Parent::find($this->Parent_id);
            $parent->update([
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
                'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
                'National_ID_Father' => $this->National_ID_Father,
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'Phone_Father' => $this->Phone_Father,
                'Nationality_Father_id' => $this->Nationality_Father_id,
                'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
                'Address_Father' =>$this->Address_Father,
                'Religion_Father_id' =>$this->Religion_Father_id,
            
                'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
                'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
                'National_ID_Mother' =>$this->National_ID_Mother,
                'Passport_ID_Mother' => $this->Passport_ID_Mother,
                'Phone_Mother' => $this->Phone_Mother,
                'Nationality_Mother_id' => $this->Nationality_Mother_id,
                'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
                'Address_Mother' =>$this->Address_Mother,
                'Religion_Mother_id' =>$this->Religion_Mother_id,
            ]);
        }
        toastr()->success(trans('messages.Update'));
        return redirect()->to('/add_parent');
    }

    public function delete($id){
        My_Parent::findOrFail($id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->to('/add_parent');
    }

    //clearForm
    public function clearForm() // = Make all Inputs Empty
    {
        $this->email = '';
        $this->password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father ='';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father ='';
        $this->Religion_Father_id ='';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother ='';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother ='';
        $this->Religion_Mother_id ='';

    }

    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

}
