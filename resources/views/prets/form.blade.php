<div class='form-floating mb-3'>
    <input @isset($pret->nomPret) value='{{ $pret->nomPret }}' @endisset required value='{{ old('nomPret') }}' type='text' class='form-control' id='nomPret' name='nomPret' placeholder='Ex: Nom'>
    <label for='floatingInput'>Nom Emprunt</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($pret->description) value='{{ $pret->description }}' @endisset value='{{ old('description') }}' type='text' class='form-control' id='description' name='description' placeholder='Ex: description'>
    <label for='floatingInput'>Description</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($pret->sommePret) value='{{ $pret->sommePret }}' @endisset type='text' value='{{ old('sommePret') }}' class='form-control' id='sommePret' name='sommePret' placeholder='Ex: somme'>
    <label for='floatingInput'>Somme Emprunt</label>
</div>




</div>




