@extends('layouts.master')

@section('title',  'Dépense')


@section('content')
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-8 m-auto text-white p-b-30">
                        <h1>Ajouter une dépense </h1>
                    </div>
                    <div class="col-md-4 m-auto text-white p-b-30">
                        <div class="text-md-right">
                            <a href="{{ route('expenses.index') }}" class="btn btn-success"> <i class="mdi mdi-arrow-left-bold-circle"></i> Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container  pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body ">
                            <form action="{{ route('expenses.store') }}" method="POST" id="myform" enctype="multipart/form-data" >
                                @csrf

                                <div class="d-flex justify-content-center radio_option">
                                    <div class="form-check mr-5">
                                        <input name="choix" type="radio" id="choix1" value="Liste" class="form-check-input" checked>
                                        <label for="" class="form-check-label">Diverses dépenses de l'école </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="choix" type="radio" id="choix2" value="Nouveau" class="form-check-input">
                                        <label for="" class="form-check-label">Dépenses sociales</label>
                                     </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="expense_at">Choisir la date du depense</label>
                                        <input type="date" name="expense_at" id="expense_at" class="form-control form-control-alternative"  value="{{ old('expense_at') }}">

                                        @error('expense_at')
                                            <div class="text text-danger" role="alert">
                                                <span>{{ $errors->first('expense_at') }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            <fieldset class="border p-2 m-2" id="contact_choice">
                                <div id="contact_fields">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <select name="type_de_depense" class="form-control {{ $errors->has('type_de_depense') ? 'is-invalid' : '' }}" id="type_de_depense" form="myform">
                                                <option value="Carburant">Carburant</option>
                                                <option value="Communication">Communication</option>
                                                <option value="Matériel bureau">Matériel Bureau</option>
                                                <option value="Autre dépense">Autre Dépense</option>
                                                <option value="Reunion"> Réunion</option>
                                            </select>
                                        </div>
                                    </div>
                                    <fieldset class="border p-2 m-2" id="depense_choice">
                                        <div id="Carburant">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="expense_amount">Montant du carburant </label>
                                                    <input type="text" name="expense_amount" class="form-control {{ $errors->has('expense_amount') ? 'is-invalid' : '' }}" id="expense_amount" value="{{ old('expense_amount') ?? '' }}" placeholder="Ex: 25000">

                                                    @error ('expense_amount')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="description">Description </label>
                                                    <input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" value="{{ old('description') ?? '' }}" placeholder="">

                                                    @error ('description')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <div id="Communication">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="expense_amount">Montant de la communication </label>
                                                    <input type="text" name="expense_amount" class="form-control {{ $errors->has('expense_amount') ? 'is-invalid' : '' }}" id="expense_amount" value="{{ old('expense_amount') ?? '' }}" placeholder="Ex: 25000">

                                                    @error ('expense_amount')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="description">Description </label>
                                                    <input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" value="{{ old('description') ?? '' }}" placeholder="">
    
                                                    @error ('description')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <div id="Materiel_bureau">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="expense_amount">Montant du materiel </label>
                                                    <input type="text" name="expense_amount" class="form-control {{ $errors->has('expense_amount') ? 'is-invalid' : '' }}" id="expense_amount" value="{{ old('expense_amount') ?? '' }}" placeholder="Ex: 25000">

                                                    @error ('expense_amount')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="description">Description </label>
                                                    <input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" value="{{ old('description') ?? '' }}" placeholder="">
    
                                                    @error ('description')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                    
                                        </div>


                                        <div id="Autre_depense">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="expense_amount">Montant autre dépense</label>
                                                    <input type="text" name="expense_amount" class="form-control {{ $errors->has('expense_amount') ? 'is-invalid' : '' }}" id="expense_amount" value="{{ old('expense_amount') ?? '' }}" placeholder="Ex: 25000">

                                                    @error ('expense_amount')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="autre_depense_type">Type de dépenses</label>
                                                    <input type="text" name="autre_depense_type" class="form-control {{ $errors->has('autre_depense_type') ? 'is-invalid' : '' }}" id="autre_depense_type" value="{{ old('autre_depense_type') ?? '' }}" placeholder="Ex: Achat de moto">

                                                    @error ('autre_depense_type')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div id="Reunion">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="reunion_amount">Montant de la réunion</label>
                                                    <input type="text" name="expense_amount" class="form-control {{ $errors->has('expense_amount') ? 'is-invalid' : '' }}" id="expense_amount" value="{{ old('expense_amount') ?? '' }}" placeholder="Ex: 25000">

                                                    @error ('expense_amount')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="description">Description </label>
                                                    <input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" value="{{ old('description') ?? '' }}" placeholder="">

                                                    @error ('description')
                                                        <span class="help-block invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>




                                    </fieldset>
                             </div>

                                <div id="contact_uploads">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="event_type">Type d'évènement </label>
                                            <input type="text" name="event_type" class="form-control {{ $errors->has('event_type') ? 'is-invalid' : '' }}" id="event_type" value="{{ old('event_type') ?? '' }}" placeholder="Ex: Type d'evenement">

                                            @error ('event_type')
                                                <span class="help-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="expense_amount">Montant de l'evenement </label>
                                            <input type="text" name="expense_amount" class="form-control {{ $errors->has('expense_amount') ? 'is-invalid' : '' }}" id="expense_amount" value="{{ old('expense_amount') ?? '' }}" placeholder="Ex: 25000">

                                            @error ('expense_amount')
                                                <span class="help-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                </div>

                            </fieldset>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" type="text/javascript"
    charset="utf-8"></script>
<script charset="utf-8">
    let form = document.forms.myform.contact_choice;
    let option = document.getElementsByName('choix');
    let contact_uploads = document.getElementById('contact_uploads');
    let contact_fields = document.getElementById('contact_fields');
    options = {contact_uploads,contact_fields};

    contact_fields.remove();
    contact_uploads.remove();


    form.appendChild(options.contact_fields);


    for(val of option){
        val.addEventListener('click', function(e){
            if(e.target.id == 'choix1'){
            form.innerHTML = '';
            form.appendChild(options.contact_fields);
            form.style.display = 'block';
        }else if(e.target.id =='choix2'){
            form.innerHTML = '';
            form.appendChild(options.contact_uploads);

            form.style.display = 'block';
            }
        })
    }

    let carburant = document.getElementById('Carburant');
    let communication = document.getElementById('Communication');
    let materiel_bureau = document.getElementById('Materiel_bureau');
    let autre_depense = document.getElementById('Autre_depense');
    let reunion = document.getElementById('Reunion');


        let fieldset_form = document.forms.myform.depense_choice;
        let all_chield = {carburant,communication,materiel_bureau,autre_depense,reunion};
        let select = document.getElementById('type_de_depense');
     carburant.remove();
     communication.remove();
     materiel_bureau.remove();
     autre_depense.remove();
     reunion.remove();

        fieldset_form.appendChild(all_chield.carburant);
        select.addEventListener('change', function(e){
            let optionValue = e.target.value;
            console.log(optionValue)

            if(optionValue === "Carburant"){
                fieldset_form.innerHTML = '';
               fieldset_form.appendChild(all_chield.carburant);
            } else if(optionValue === "Communication"){
                fieldset_form.innerHTML='';
                fieldset_form.appendChild(all_chield.communication);
            }
            else if(optionValue === "Matériel bureau"){
                fieldset_form.innerHTML='';
                fieldset_form.appendChild(all_chield.materiel_bureau);
            }
            else if(optionValue === 'Autre dépense'){
                fieldset_form.innerHTML='';
                fieldset_form.appendChild(all_chield.autre_depense);
            }
            else if(optionValue === "Reunion"){
                fieldset_form.innerHTML='';
                fieldset_form.appendChild(all_chield.reunion);
            }

        });


</script>
@endSection
