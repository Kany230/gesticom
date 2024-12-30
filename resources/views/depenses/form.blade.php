<div class='form-floating mb-3'>
    <input @isset($depense->nom) value='{{ $depense->nom }}' @endisset required value='{{ old('nom') }}' type='text' class='form-control' id='nom' name='nom' placeholder='Ex: Nom'>
    <label for='floatingInput'>Nom</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($depense->description) value='{{ $depense->description }}' @endisset value='{{ old('description') }}' type='text' class='form-control' id='description' name='description' placeholder='Ex: description'>
    <label for='floatingInput'>Description</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($depense->somme) value='{{ $depense->somme }}' @endisset type='text' value='{{ old('somme') }}' class='form-control' id='somme' name='somme' placeholder='Ex: somme'>
    <label for='floatingInput'>Somme Achat</label>
</div>




</div>




