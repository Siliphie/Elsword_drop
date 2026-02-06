<h1>adding my drop statistic</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('drops.store') }}" method="POST">
    @csrf
    <div>
        <label>Item name:</label>
        <input type="text" name="item_name" required placeholder="Ex: barion's fur ornament">
    </div>

    <div>
        <label>Attempted run :</label>
        <input type="number" name="run_attempt" required placeholder="Ex: 220">
    </div>

    <div>
        <label>Drop Rate (%) :</label>
        <input type="number" name="drop_rate_ratio" required placeholder="Ex: 425">
    </div>

    <button type="submit">save data</button>
</form>

<a href="/">Retour à l'accueil</a>