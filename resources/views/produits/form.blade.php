<div class='form-floating mb-3'>
    <input @isset($produits->nom_articles) value='{{ $produits->nom_articles }}' @endisset required value='{{ old('nom_articles') }}' type='text' class='form-control' id='nom_articles' name='nom_articles' placeholder='Ex: Nom'>
    <label for='floatingInput'>Nom de l'article</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($produits->stock) value='{{ $produits->stock }}' @endisset value='{{ old('stock') }}' type='text' class='form-control' id='stock' name='stock' placeholder='Ex: stock'>
    <label for='floatingInput'>Stock de l'article</label>
</div>

<div class='form-floating mb-3'>
    <input @isset($produits->prixAchat) value='{{ $produits->prixAchat }}' @endisset type='text' value='{{ old('prixAchat') }}' class='form-control' id='prixAchat' name='prixAchat' placeholder='Ex: prix total achat'>
    <label for='floatingInput'>Prix total d'achat</label>
</div>


</div>




