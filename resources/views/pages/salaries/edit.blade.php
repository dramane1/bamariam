




@extends('layouts.master')

@section('title',  'Modifier Salaire')



@section('content')
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-8 m-auto text-white p-b-30">
                        <h1>Modifier un  salaire</h1>
                    </div>
                    <div class="col-md-4 m-auto text-white p-b-30">
                        <div class="text-md-right">
                            <a href="{{ route('salaries.index') }}" class="btn btn-success"> <i class="mdi mdi-arrow-left-bold-circle"></i> Retour</a>
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
                            <form action="{{ route('salaries.update',$salary) }}" method="POST" id="myform" enctype="multipart/form-data" >
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="d-flex justify-content-center radio_option">
                                    <div class="form-check mr-5">
                                        <input name="choix" type="radio" id="choix1" value="Liste" class="form-check-input" checked>
                                        <label for="" class="form-check-label">1 er cycle et jardin</label>
                                    </div>
                                    <div class="form-check mr-5">
                                        <input name="choix" type="radio" id="choix2" value="Nouveau" class="form-check-input">
                                        <label for="" class="form-check-label">2 ème cycle </label>
                                     </div>
                                     <div class="form-check">
                                        <input name="choix" type="radio" id="choix3" value="Nouveau" class="form-check-input">
                                        <label for="" class="form-check-label"> Personnel et autres </label>
                                     </div>
                                </div>
                            <fieldset class="border p-2 m-2" id="contact_choice">
                                <div id="contact_fields">
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="classe">Choisir la classe</label>
                                            <select name="classe" class="form-control {{ $errors->has('classe') ? 'is-invalid' : '' }}" id="classe" form="myform">
                                                <option value="Jardin">Jardin</option>
                                                <option value="1 ère année">1 ère année</option>
                                                <option value="2 ème année">2 ème année</option>
                                                <option value="3 ème année">3 ème année</option>
                                                <option value="4 ème année">4 ème année</option>
                                                <option value="5 ème année">5 ème année</option>
                                                <option value="6 ème année"> 6 ème année</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="salary_amount">Saisir le salaire </label>
                                            <input type="text" name="salary_amount" class="form-control {{ $errors->has('salary_amount') ? 'is-invalid' : '' }}" id="salary_amount" value="{{ old('salary_amount') ?? $salary->salary_amount }}" placeholder="Ex: 25000">

                                            @error ('salary_amount')
                                                <span class="help-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="salary_at">Choisir la date </label>
                                                <input type="date" name="salary_at" id="salary_at" class="form-control form-control-alternative"  value="{{ old('salary_at') ?? $salary->salary_at }}">

                                                @error('salary_at')
                                                    <div class="text text-danger" role="alert">
                                                        <span>{{ $errors->first('salary_at') }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="contact_uploads">
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="classe">Choisir la classe</label>
                                            <select name="classe" class="form-control {{ $errors->has('classe') ? 'is-invalid' : '' }}" id="classe" form="myform">
                                                <option value="7 ème année">7 ème année</option>
                                                <option value="8 ème année">8 ème année</option>
                                                <option value="9 ème année">9 ème année</option>
                                                <option value="Contrat">Contrat</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="salary_amount">Saisir le salaire </label>
                                            <input type="text" name="salary_amount" class="form-control {{ $errors->has('salary_amount') ? 'is-invalid' : '' }}" id="salary_amount" value="{{ old('salary_amount') ?? '' }}" placeholder="Ex: 25000">

                                            @error ('salary_amount')
                                                <span class="help-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="salary_at">Choisir la date </label>
                                                <input type="date" name="salary_at" id="salary_at" class="form-control form-control-alternative"  value="{{ old('salary_at') }}">

                                                @error('salary_at')
                                                    <div class="text text-danger" role="alert">
                                                        <span>{{ $errors->first('salary_at') }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="personnel_fields">
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="divers_salary_type">Choisir le type</label>
                                            <select name="divers_salary_type" class="form-control {{ $errors->has('divers_salary_type') ? 'is-invalid' : '' }}" id="divers_salary_type" form="myform">
                                                <option value="direction">Direction</option>
                                                <option value="famille">Famille</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="salary_amount">Saisir le salaire </label>
                                            <input type="text" name="salary_amount" class="form-control {{ $errors->has('salary_amount') ? 'is-invalid' : '' }}" id="salary_amount" value="{{ old('salary_amount') ?? $salary->salary_amount }}" placeholder="Ex: 25000">

                                            @error ('salary_amount')
                                                <span class="help-block invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="salary_at">Choisir la date </label>
                                                <input type="date" name="salary_at" id="salary_at" class="form-control form-control-alternative"  value="{{ old('salary_at') ?? $salary->salary_at }}">

                                                @error('salary_at')
                                                    <div class="text text-danger" role="alert">
                                                        <span>{{ $errors->first('salary_at') }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
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
    let  personnel_fields= document.getElementById('personnel_fields');

    options = {contact_uploads,contact_fields,personnel_fields};

    contact_fields.remove();
    contact_uploads.remove();
    personnel_fields.remove();


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
            }else if(e.target.id =='choix3'){
            form.innerHTML = '';
            form.appendChild(options.personnel_fields);

            form.style.display = 'block';
            }
        })
    }

</script>
@endSection









































