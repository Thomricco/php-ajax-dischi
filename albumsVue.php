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
            albumsList: []
        },
        mounted() {
            axios.get("http://localhost:8888/php-ajax-dischi/api/albums.php")
            .then(resp => {
                this.albumsList = resp.data;
            })
        }
        })
    </script>
</body>

</html>