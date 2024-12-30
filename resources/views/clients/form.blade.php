<div class='form-floating mb-3'>
    <input @isset($clients->first_name) value='{{ $clients->first_name }}' @endisset required value='{{ old('first_name') }}' type='text' class='form-control' id='first_name' name='first_name' placeholder='Ex: Arame'>
    <label for='floatingInput'>Prénom du client</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($clients->last_name) value='{{ $clients->last_name }}' @endisset value='{{ old('last_name') }}' type='text' class='form-control' id='last_name' name='last_name' placeholder='Ex: Dieng'>
    <label for='floatingInput'>Nom du client</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($clients->address) value='{{ $clients->address }}' @endisset type='text' value='{{ old('address') }}' class='form-control' id='address' name='address' placeholder='Ex: Som'>
    <label for='floatingInput'>Adresse du client</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($clients->phone) value='{{ $clients->phone }}' @endisset value='{{ old('phone') }}' type='text' class='form-control' id='phone' name='phone' placeholder='Ex: +221 77 777 77 77'>
    <label for="floatingInput">Téléphone du client</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($clients->produit) value='{{ $clients->produit }}' @endisset type='text' value='{{ old('produit') }}' class='form-control' id='produit' name='produit' placeholder='Ex: Nom_article'>
    <label for='floatingInput'>Produit</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($clients->quantite) value='{{ $clients->quantite }}' @endisset type='text' value='{{ old('quantite') }}' class='form-control' id='quantite' name='quantite' placeholder='Ex: 10'>
    <label for='floatingInput'>Quantite</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($clients->prixRevente) value='{{ $clients->prixRevente }}' @endisset type='text' value='{{ old('prixRevente') }}' class='form-control' id='prixRevente' name='prixRevente' placeholder='Ex: 10000'>
    <label for='floatingInput'>Prix de vente</label>
</div>

<div class='mb-3'>
    <label class='form-label' for='status'>
      Statut du client
    </label>
    <select name='status' id='status' class="form-select">
        <option value="payée">Payée</option>
        <option value="dette">Dette</option>
    </select>
</div>

