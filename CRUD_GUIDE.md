- [REALIZZARE UNA CRUD](#realizzare-una-crud)
  - [Creare il Resource Model](#creare-il-resource-model)
  - [Creare la Migration](#creare-la-migration)
  - [Creare il Seeder](#creare-il-seeder)
  - [Gestire le rotte](#gestire-le-rotte)
  - [Il Resource Controller](#il-resource-controller)
    - [R - READ](#r---read)
      - [index - Lista](#index---lista)
      - [show - Dettaglio](#show---dettaglio)
    - [C - CREATE](#c---create)
      - [create - Form](#create---form)
      - [store - Inserimento](#store---inserimento)

# REALIZZARE UNA CRUD

## Creare il Resource Model

questo comando genera Model, Migration, Seeder e Resource Controller;

```
php artisan make:model Pasta -msrc
```

## Creare la Migration

dovremo inserire la struttura della tabella nella funzione `up` che crea la tabella.

```php
// database/migrations/xxxx_xx_xx_xxxxxx_create_pastas_table.php

/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
  Schema::create('pastas', function (Blueprint $table) {
    // id() genera una colonna int, primary key, AI, not null
    $table->id();

    $table->string('name', 20);
    $table->integer('number')->unique();
    $table->enum('type', ['lunga', 'corta', 'cortissima']);
    $table->integer('cooking_time')->unsigned();
    $table->integer('weight')->unsigned();
    $table->text('description')->nullable();
    $table->text('image')->nullable();

    // timestamps() genera le colonne created_at ed updated_at
    $table->timestamps();
  });
}
```

Bisogna assicurarsi che venga cancellata nella funzione `down`, nella quale deve sempre avvenire l'inverso della funzione `up`

```php
// database/migrations/xxxx_xx_xx_xxxxxx_create_pastas_table.php

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
  Schema::dropIfExists('pastas');
}
```

A questo punto è possibile lanciare la Migration con il comando

```
php artisan migrate
```

## Creare il Seeder

Nel Seeder è possibile importare i dati da un array o generarli con Faker.
Bisogna assicurarsi di aver importato il modello da seeddare ed, eventualmente, Faker.

```php
// database/seeders/PastaSeeder.php

use App\Models\Pasta;
use Faker\Generator as Faker;
```

Il metodo `run()` permetterà il popolamento della tabella. al suo interno Faker genererà i dati di solito in un ciclo `for`.
NB. Bisogna passare Faker come argomento usando una dependency injection.

```php
// database/seeders/PastaSeeder.php

/**
* Run the database seeds.
*
* @return void
*/
public function run(Faker $faker)
{
  for($i = 0; $i < 50; $i++) {
    $pasta = new Pasta;
    $pasta->name = $faker->firstNameFemale();
    $pasta->number = $faker->unique()->numberBetween(1, 100);
    $pasta->type = $faker->randomElement(['lunga', 'corta', 'cortissima']);
    $pasta->cooking_time = $faker->numberBetween(8, 14);
    $pasta->weight = $faker->randomElement([500, 1000]);
    $pasta->description = $faker->paragraph(8);
    $pasta->img = "https://picsum.photos/300/200";
    $pasta->save();
  }
}
```

nella funzione `run()` del file DatabaseSeeder.php va aggiunta la call per il seeder creato (ed ogni altro seeder che va lanciato col comando `db:seed`)

```php
// database/seeders/DatabaseSeeder.php

public function run()
{
  $this->call([
    PastaSeeder::class,
  ]);
}
```

Si può poi popolare il DB col comando:

```
php artisan db:seed
```

## Gestire le rotte

Bisogna importare il controller che si occuperà di gestire la risorsa nel file `web.php`

```php
// routes/web.php

use App\Http\Controllers\PastaController;
```

poi usando il metodo statico `resource` della classe `Route` verranno generate tutte le rotte della CRUD che andranno associate al controller preposto alla gestione della risorsa

```php
// routes/web.php

Route::resource('pastas', PastaController::class);
```

## Il Resource Controller

Usando il parametro `rc` nella creazione del modello, questo risulterà già importato nel controller. Diversamente dovremo accertarci che lo sia

```php
// App/Http/Controllers/PastaController.php

use App\Models\Pasta;
```

### R - READ

La lettura delle risorse dal Database

#### index - Lista

nel metodo index del controller recupereremo i risultati con il metodo statico del modello `::all()`, oppure filtrando con `::where(...)->get()`.

Se ci fosse bisogno della paginazione, è possibile sostiuire `all()` o `get()` con il metodo `paginate(n_items_per_page)`

```php
// App/Http/Controllers/PastaController.php

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  $pastas = Pasta::paginate(8);
  return view('pastas.index', compact('pastas'));
}

```

A questo punto vengono ritornando i dati al template `index.blade.php` nella cartella della risorsa. Va perciò creata.

Aggiungeremo man mano i link alle altre rotte.

```blade
{{-- resources/views/pastas/index.blade.php --}}

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Numero</th>
            <th scope="col">Tipo</th>
            <th scope="col">Minuti di cottura</th>
            <th scope="col">Grammi</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pastas as $pasta)
        <tr>
            <th scope="row">{{ $pasta->id }}</th>
            <td>{{ $pasta->name }}</td>
            <td>{{ $pasta->number }}</td>
            <td>{{ $pasta->type }}</td>
            <td>{{ $pasta->cooking_time }}</td>
            <td>{{ $pasta->weight }}</td>
            <td>...</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Se è stata usata la paginazione --}}
{{ $pastas->links('pagination::bootstrap-5') }}
```

#### show - Dettaglio

Va creato il dettaglio della singola risorsa. Il metodo `show` del controller dovrà ritornare il form:

```php
// App/Http/Controllers/PastaController.php

/**
 * Display the specified resource.
 *
 * @param  \App\Models\Pasta $pasta
 * @return \Illuminate\Http\Response
 */
public function show(Pasta $pasta)
{
  return view('pastas.show', compact('pasta'));
}
```

e la sua vista:

```blade
{{-- resources/views/pastas/show.blade.php --}}

<strong>Nome: </strong> {{ $pasta->name }} <br />
<strong>N°: </strong> {{ $pasta->number }} <br />
<strong>Tempo di cottura: </strong> {{ $pasta->cooking_time }} <br />
<strong>Tipo: </strong> {{ $pasta->type }} <br />
<strong>Peso: </strong> {{ $pasta->weight }} <br />
<strong>Descrizione:</strong> {{ $pasta->description }} <br />
```

infine va aggiunto il link al dettaglio nella cella "actions" della lista

```blade
{{-- resources/views/pastas/index.blade.php --}}

<table class="table">
    ...
    <tbody>
        @foreach ($pastas as $pasta)
        <tr>
            <th scope="row">{{ $pasta->id }}</th>
            ...
            <td>
                <a href="{{ route('pastas.show', $pasta) }}"> Dettaglio </a>

                ...
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
```

### C - CREATE

#### create - Form

La rotta `create` dovrà restituire la vista del form

```php
// App/Http/Controllers/PastaController.php

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('pastas.create');
}
```

nella vista stamperemo tutti gli input.
Il form dovrà:

- avere method `POST`
- la sua action dovrà puntare alla rotta dello store
- contenere la direttiva `@csrf` per generare il token di sicurezza

```blade
{{-- resources/views/pastas/create.blade.php --}}

<form action="{{ route('pastas.store') }}" method="POST">
    @csrf

    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" />

    <label for="number" class="form-label">N°</label>
    <input type="text" class="form-control" id="number" name="number" />

    <label for="type" class="form-label">Tipo</label>
    <select class="form-select" id="type" name="type">
        <option value="lunga">Lunga</option>
        <option value="corta">Corta</option>
        <option value="cortissima">Cortissima</option>
    </select>

    <label for="cooking_time" class="form-label">Tempo di cottura</label>
    <input
        type="number"
        class="form-control"
        id="cooking_time"
        name="cooking_time"
    />

    <label for="weight" class="form-label">Peso (g)</label>
    <input type="text" class="form-control" id="weight" name="weight" />

    <label for="img" class="form-label">img</label>
    <input type="text" class="form-control" id="img" name="img" />

    <label for="description" class="form-label">Descrizione</label>
    <textarea
        class="form-control"
        id="description"
        name="description"
        rows="4"
    ></textarea>

    <button type="submit" class="btn btn-primary">Salva</button>
</form>
```

In ultimo va creato il link al form di creazione

```blade
{{-- resources/views/pastas/index.blade.php --}}

<a href="{{ route('pastas.create') }}" role="button" class="btn btn-primary">Crea pasta</a>

<table class="table">
    ...
</table>
```

#### store - Inserimento

Va predisposto il modello a ricevere dati da form con la variabile d'istanza protetta `$fillable`

```php
// App\Models\Pasta.php;

class Pasta extends Model
{
    use HasFactory;

    protected $fillable = ["name", "number", "type", "cooking_time", "weight", "img", "description"];
}

```

Nel metodo `store()` gestiremo la logica del salvataggio reindirizzando poi l'utente alla rotta `show()`

```php
// App/Http/Controllers/PastaController.php

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $data = $request->all();
    $pasta = new Pasta;
    $pasta->fill($data);
    $pasta->save();
    return redirect()->route('pastas.show', $pasta);
}
```
