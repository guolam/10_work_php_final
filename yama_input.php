<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>入力画面</title>
</head>

<body>
    <!-- <form action="login_confirm.php" method="POST"> -->

    <p>行きたい山を選んでいく</p>
    <!-- <a href="todo_read.php">一覧画面</a> -->

    <div>
        <select id="mont">
            <option></option>
            <option value="1" id="mont">百名山</option>
            <option value="2" id="mont">二百名山</option>
        </select>

        <select class="prefecture" id="prefecture">
            <option></option>
            <option value="1">北海道</option>
            <option value="2">青森県</option>
            <option value="3">岩手県</option>
            <option value="4">宮城県</option>
            <option value="5">秋田県</option>
            <option value="6">山形県</option>
            <option value="7">福島県</option>
            <option value="8">茨城県</option>
            <option value="9">栃木県</option>
            <option value="10">群馬県</option>
            <option value="11">埼玉県</option>
            <option value="12">千葉県</option>
            <option value="13">東京都</option>
            <option value="14">神奈川県</option>
            <option value="15">新潟県</option>
            <option value="16">富山県</option>
            <option value="17">石川県</option>
            <option value="18">福井県</option>
            <option value="19">山梨県</option>
            <option value="20">長野県</option>
            <option value="21">岐阜県</option>
            <option value="22">静岡県</option>
            <option value="23">愛知県</option>
            <option value="24">三重県</option>
            <option value="25">滋賀県</option>
            <option value="26">京都府</option>
            <option value="27">大阪府</option>
            <option value="28">兵庫県</option>
            <option value="29">奈良県</option>
            <option value="30">和歌山県</option>
            <option value="31">鳥取県</option>
            <option value="32">島根県</option>
            <option value="33">岡山県</option>
            <option value="34">広島県</option>
            <option value="35">山口県</option>
            <option value="36">徳島県</option>
            <option value="37">香川県</option>
            <option value="38">愛媛県</option>
            <option value="39">高知県</option>
            <option value="40">福岡県</option>
            <option value="41">佐賀県</option>
            <option value="42">長崎県</option>
            <option value="43">熊本県</option>
            <option value="44">大分県</option>
            <option value="45">宮崎県</option>
            <option value="46">鹿児島県</option>
            <option value="47">沖縄県</option>
        </select>
    </div>

    <div>
        <button id="button">検索</button>
    </div>
    <!-- 
    <div class="container">
        <button class="ajax_button" href="mt_create.php">ajax</button>
        <div id="output"></div>
    </div> -->

    <div>

        <!-- <a id="summit" href="mt_create.php">submit</a> -->
    </div>

    <!-- jquery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery.min.js"></script> -->
    <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $("#button").on("click", function() {

            let no = document.getElementById("mont").value
            let str = document.getElementById("prefecture").value

            let mont_no = no;
            let ken = str;

            console.log(mont_no);
            console.log(ken);

            //APIを動かす変数
            const mont_tag = mont_no; //百名山、二百名山
            const prefecture = ken; //県

            const URL_mont = `https://mountix.codemountains.org/api/v1/mountains?tag=${mont_tag}&prefecture=${prefecture}`;


            axios.get(URL_mont)
                .then(function(response) {

                    console.log(response.data) //dataの確認

                    const mont = Object.entries(response.data);
                    console.log(Object.entries(response.data)); //dataを配列に戻す

                    const mountain = mont[0]; //必要なデータを取り出す
                    let data = mountain[1]; //さらに奥のデータを取り出す

                    console.log(mountain[1]); //取れてるかどうかの確認
                    console.log(data[0]); //理想のdata状態確認^^


                    const yama = []; //空の配列


                    data.forEach(function(good_mont) {

                        yama.push(`<form action="mt_create.php" method="POST"><div><input class="yamapush" name="check" type="checkbox">
                            <p name="mountain_id">${good_mont.id}</p>
                            <p name="name">${good_mont.name}</p>
                            <p name="nameKana">${good_mont.nameKana}</p>
                            <p name="area">${good_mont.area}</p>
                            <p name="prefecture">${good_mont.prefectures}</p>
                            <a name="gsiUrl" href=${good_mont.location.gsiUrl}>地図</a>
                            <div><p name="latitude">${good_mont.location.latitude}</p>
                            <p name="longitude">${good_mont.location.longitude}</p>
                            </div> <a id="summit" href="mt_create.php">submit</a></div></form>`) //データ取得＆HTML表示

                    });

                    // $('li').on('click', function() {
                    //     var index = $('li.sample').index(this);
                    //     alert(index);
                    // });

                    $("#output").html(yama); //outputのとこに、取ってきたデータを表示させる
                });
        });

        $(".ajax_button").on("click", function() {

            let no = document.getElementById("mont").value
            let str = document.getElementById("prefecture").value

            let mont_no = no;
            let ken = str;

            console.log(mont_no);
            console.log(ken);

            //APIを動かす変数
            const mont_tag = mont_no; //百名山、二百名山
            const prefecture = ken; //県

            const URL_mont = `https://mountix.codemountains.org/api/v1/mountains?tag=${mont_tag}&prefecture=${prefecture}`;

            axios.get(URL_mont)
                .then(function(response) {

                    console.log(response.data) //dataの確認

                    const mont = Object.entries(response.data);
                    console.log(Object.entries(response.data)); //dataを配列に戻す

                    const mountain = mont[0]; //必要なデータを取り出す
                    let data = mountain[1]; //さらに奥のデータを取り出す

                    // const data2 = Object.entries(mountain[1]);
                    console.log(data);
                    console.log(data.name);

                    for (var i = 0; i < data.length; i++)
                        var data1 = {

                            name: data[i].name,
                            prefecture: data[i].prefecture,

                        };


                    const url = 'yama_create.php';

                    axios.post(url, data1) //
                        .then(response => {

                            console.log(response.data1);

                        })
                        .catch(error => {

                            console.log(error);

                        });

                });
        });


        // $(".ajax_button").on("click", function() {

        //     var url = '/mt_create.php';

        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         data: {
        //             data: data
        //         }
        //     }).done(function(data) {
        //         data = JSON.parse(data);
        //         console.log(data);
        //     }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
        //         return;
        //     })
        // });
    </script>
    </div>
</body>

</html>