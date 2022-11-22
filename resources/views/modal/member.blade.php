<div class="modal" id="view_{{$member->id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <style>
                    .card {
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                        max-width: 300px;
                        margin: auto;
                        text-align: center;
                        font-family: arial;
                        background-image: url("https://t4.ftcdn.net/jpg/03/08/39/01/360_F_308390198_a9AABEy2qi3lSmmzVUuDGTriUBFgTDTt.jpg");
                    }

                    .title {
                        color: rgb(231, 18, 18);
                        font-size: 18px;
                    }

                    .bete {
                        border: none;
                        outline: 0;
                        display: inline-block;
                        padding: 8px;
                        color: white;
                        background-color: #000;
                        text-align: center;
                        cursor: pointer;
                        width: 100%;
                        font-size: 18px;
                    }

                    a {
                        text-decoration: none;
                        font-size: 22px;
                        color: black;
                    }

                    button:hover,
                    a:hover {
                        opacity: 0.7;
                    }
                </style>
                </head>

                <body>
                    <?php 
                         $images = substr($member->members->profile_photo_path , 11);
                        ?>
                    <div class="card">
                        <img src="{{
                            url('/api/imageuser/' . $images) }}" alt="John" style="width:100%; height:300px">
                        <h4><b>{{ $member->members->fullname }}</b></h4>
                        <p class="title">{{ $member->number_card }}</p>
                        <center>
                            <p>
                                <?php echo $barcode->getBarcodeHTML($member->number_card, 'EAN13');
                                ?>
                            </p>
                        </center>
                        <p><button class="bete">Member Card Library</button></p>
                    </div>
            </div>

        </div>
    </div>
</div>