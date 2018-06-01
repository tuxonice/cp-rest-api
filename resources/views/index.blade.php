<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zipcode API for Portugal</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>
    body {
        padding-top: 5rem;
    }
    
    .starter-template {
        padding: 3rem 1.5rem;
        text-align: center;
    }
    .label {
        color:#145222
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <span class="navbar-brand">Zipcode API for Portugal</span>
    </nav>
    <div class="container">
      <div class="row">
          <div class="col-12-md">
            <h2>1. Usage</h2>
            <p><code>{{$host}}/api/v1/{cp4}/{cp3}</code></p>
            <p>Example: <a href="{{$host}}/api/v1/1990/231">{{$host}}/api/v1/1990/231</a></p>
            <h2>2. Output</h2>
            <p><pre>
[
  {
    "name": "Lisboa",
    "district": "Lisboa",
    "municipality": "Lisboa",
    "id": 136883,
    "location_id": 21696,
    "municipality_id": 6,
    "district_id": 11,
    "art_cod": "300460611",
    "art_tipo": "Rossio",
    "pri_prep": "dos",
    "art_titulo": "",
    "seg_prep": "",
    "art_desig": "Olivais",
    "art_local": "",
    "troco": "",
    "porta": "",
    "cliente": "",
    "cp4": "1990",
    "cp3": "231",
    "cpalf": "LISBOA",
    "latitude": null,
    "longitude": null
  }
]
</pre></p>
<h3>2.1 Labels (portuguese only)</h3>
<p>
    <b>name</b> <span class="label">Nome da localidade</span><br />
    <b>art_cod</b> <span class="label">Código da Artéria</span><br />
    <b>art_tipo</b> <span class="label">Artéria - Tipo (Rua, Praça, etc)</span><br />
    <b>pri_prep</b> <span class="label">Primeira preposição</span><br />
    <b>art_titulo</b> <span class="label">Artéria - Titulo (Doutor, Eng.º, Professor, etc)</span><br />
    <b>seg_prep</b> <span class="label">Segunda preposição</span><br />
    <b>art_desig</b> <span class="label">Artéria - Designação</span><br />
    <b>art_local</b> <span class="label">Artéria - Informação do Local/Zona</span><br />
    <b>troco</b> <span class="label">Descrição do troço</span><br />
    <b>porta</b> <span class="label">Número da porta do cliente</span><br />
    <b>cliente</b> <span class="label">Nome do cliente</span><br />
    <b>cp4</b> <span class="label">N.º do código postal</span><br />
    <b>cp3</b> <span class="label">Extensão do n.º do código postal</span><br />
    <b>cpalf</b> <span class="label">Designação Postal</span>
</p>
<h2>3. Random ZipCode</h2>
<p>If you need data from a random zipcode:</p>
<p><code>{{$host}}/api/v1/random</code></p>

<h2>4. Limit rate</h2>
<p>The API endpoint rate limit is 45 requests per minute</p>

<h3>License</h3>
<p>
<small>THE SERVICE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.</small>
</p>
          </div>
      </div>
    </div>
  </body>
</html>
