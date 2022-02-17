<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">

        <div class="navbar">
             <div class="nav">
                <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Spotify_App_Logo.svg/2048px-Spotify_App_Logo.svg.png" alt="">
            </div>
            <select 
            class="selettore" 
            v-model="selected" 
            @change="('filtra', selected)">
                <option disabled value="">Scegli il tuo genere</option>
                <option v-for="(genre, i) in listaFiltrata" :key="i">{{album.genre}}</option>
                <option value="">Tutti</option>
            </select>
            
        </div>
        <main>

            <div class="container">
                <div class="container-album">
                    <div class="album-box">
                        <div v-for="album in albumsList" class="box">
                            <img :src="album.poster" class="box-img" alt="">
                            <p class="text-title">{{album.title}}</p>
                            <p class="text-author">{{album.author}}</p>
                            <p class="text-years">{{album.year}}</p>
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </div>

    <script>
        var app = new Vue({
        el: '#app',
        data: {
            albumsList: [],
            albumFiltrati: [],
            listaFiltrata: [],
            selected: ''
        },
        mounted() {
            axios.get("http://localhost:8888/php-ajax-dischi/api/albums.php")
            .then(resp => {
                this.albumsList = resp.data;
            })
        },
        methods: {
            filterResult(key) {
            (key);
            this.albumFiltrati = this.albumsList.filter((album) => {
                return album.genre.toLowerCase().includes(key.toLowerCase())
            })
            },
        },
        computed: {
            listaGeneri() {
            const listaFiltrata = [];
            this.albumsList.forEach((generi) => {
                if(!listaFiltrata.includes(generi.genre.toLowerCase())) {
                listaFiltrata.push(generi.genre.toLowerCase())
                }
            })
            return listaFiltrata;
            }
        },

        
        })
    </script>
</body>

</html>