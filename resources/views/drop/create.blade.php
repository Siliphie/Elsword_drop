<h1>Ajouter mes statistiques de Drop</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('drops.store') }}" method="POST">
    @csrf
    <div>
        <label>Nom de l'item :</label>
        <input type="text" name="item_name" required placeholder="Ex: Fragment de Henir">
    </div>

    <div>
        <label>Nombre de runs effectués :</label>
        <input type="number" name="run_attempt" required placeholder="Ex: 220">
    </div>

    <div>
        <label>Votre Drop Rate (%) :</label>
        <input type="number" name="drop_rate_ratio" required placeholder="Ex: 425">
    </div>

    <button type="submit">Enregistrer les données</button>
</form>

<a href="/">Retour à l'accueil</a>