@extends('layouts.front_layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

<style>
    body {
        margin: auto;
        background: #eaeaea;
        font-family: 'Open Sans', sans-serif;
    }

    .info p {
        text-align: center;
        color: #999;
        text-transform: none;
        font-weight: 600;
        font-size: 15px;
        margin-top: 2px
    }

    .info i {
        color: #F6AA93;
    }

    form h1 {
        font-size: 18px;
        background: #F6AA93 none repeat scroll 0% 0%;
        color: rgb(255, 255, 255);
        padding: 22px 25px;
        border-radius: 5px 5px 0px 0px;
        margin: auto;
        text-shadow: none;
        text-align: left
    }

    form {
        border-radius: 5px;
        max-width: 700px;
        width: 100%;
        margin: 5% auto;
        background-color: #FFFFFF;
        overflow: hidden;
    }

    p span {
        color: #F00;
    }

    p {
        margin: 0px;
        font-weight: 500;
        line-height: 2;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #666;
        text-shadow: 1px 1px 0px #FFF;
        margin: 50px 0px 0px 0px
    }

    input {
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #eee;
        margin-bottom: 15px;
        width: calc( 100% - 35px );
        height: 40px;
        float: left;
        padding: 0px 15px;
    }

    a {
        text-decoration: inherit
    }

    textarea {
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #EEE;
        margin: 0;
        width: 75%;
        height: 130px;
        float: left;
        padding: 0px 15px;
    }

    .icon-case {
        width: 35px;
        float: left;
        border-radius: 5px 0px 0px 5px;
        background: #eeeeee;
        height: 42px;
        position: relative;
        text-align: center;
        line-height: 40px;
    }

    i {
        color: #555;
    }

    .contentform {
        padding: 40px 30px;
    }

    .bouton-contact {
        background-color: #81BDA4;
        color: #FFF;
        text-align: center;
        width: 100%;
        border: 0;
        padding: 17px 25px;
        border-radius: 0px 0px 5px 5px;
        cursor: pointer;
        margin-top: 40px;
        font-size: 18px;
    }

    .detail_form {
        width: 100%;
        box-sizing: border-box;
    }

    /*     .rightcontact {
        width: 49.5%;
        float: right;
        box-sizing: border-box;
        padding: 0px 0px 0px 15px;
    } */

    .validation {
        display: none;
        margin: 0 0 10px;
        font-weight: 400;
        font-size: 13px;
        color: #DE5959;
    }

    #sendmessage {
        border: 1px solid #fff;
        display: none;
        text-align: center;
        margin: 10px 0;
        font-weight: 600;
        margin-bottom: 30px;
        background-color: #EBF6E0;
        color: #5F9025;
        border: 1px solid #B3DC82;
        padding: 13px 40px 13px 18px;
        border-radius: 3px;
        box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.03);
    }

    #sendmessage.show,
    .show {
        display: block;
    }
</style>

@endsection

@section('content')

<div class="container">

    <body>
        <h1>會員詳細資料</h1>


        <form method="post" action="/user_detail_input/store">
            @csrf
            <h1>請填寫您的會員詳細資料，此為訂購票卷時需要資訊</h1>

            <div class="contentform">
                <div id="sendmessage"> 修改資料成功！感謝您的配和 </div>
                <div class="detail_form">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <p>稱謂<span>*</span></p>
                                <span class="icon-case"><i class="fas fa-venus-mars"></i></span>
                                <select name="gender" class="form-control" style="width:90%" id="gender" data-rule="required"
                                data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné.">
                                    <option value="male">先生</option>
                                    <option value="female">小姐</option>
                                </select>
                                <div class="validation"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <p>姓 (Last Name)<span>* <small>與護照同</small></span></p>
                                <span class="icon-case"><i class="fa fa-male"></i></span>
                                <input type="text" name="last_name" id="last_name" data-rule="required"
                                    data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné." />
                                <div class="validation"></div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <p>名 (First Name) <span>*<small>與護照同</small></span></p>
                            <span class="icon-case"><i class="fa fa-user"></i></span>
                            <input type="text" name="first_name" id="first_name" data-rule="required"
                                data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné." />
                            <div class="validation"></div>
                        </div>

                        <div class="form-group col-12">
                            <p>身分證號碼<span>*</span></p>
                            <span class="icon-case"><i class="fas fa-id-card"></i></i></span>
                            <input type="text" name="id_number" id="id_number" data-rule="required"
                                data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné." />
                            <div class="validation"></div>
                        </div>

                        <div class="form-group col-12">
                            <p>護照號碼<span>*</span></p>
                            <span class="icon-case"><i class="fa fa-passport"></i></span>
                            <input type="text" name="passport_number" id="passport_number" data-rule="required"
                                data-msg="Vérifiez votre saisie sur les champs : Le champ 'passport_name' doit être renseigné." />
                            <div class="validation"></div>
                        </div>

                        <div class="form-group col-12">
                            <p>手機號碼<span>*</span></p>
                            <span class="icon-case"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" id="phone" data-rule="maxlen:10"
                                data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres" />
                            <div class="validation"></div>
                        </div>


                    </div>


                </div>


            </div>
            <button type="submit" class="bouton-contact">送出</button>

        </form>


    </body>

    </html>


</div>

@endsection

@section('js')

<script>
    $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            }
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'US',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});




</script>

@endsection
