const fileInput = document.querySelector('#file-selector input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-selector .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }

  var count = 0;
  // var memberID;

  $('#add_member').on('click', function() {
    // memberID = `member${count}`;
    if(count <= 10 && $(`#member${count}`).val() != ""){
      count++;
      $('#memberinput').append('<div class="field is-horizontal">'
                              + '<div class="field-label is-normal"></div>'
                              + '<div class="field-body">'
                              + '<div class="field">'
                              + '<div class="control has-icons-left has-icons-right">'
                              + `<input class="input column is-half" type="text" id="member${count}" name="member[]" maxlength="30" placeholder="代表者以外のメンバーの名前を入力してください">`
                              + '<span class="icon is-small is-left">'
                              + '<i class="fas fa-user"></i>'
                              + '</span>'
                              + '</div>'
                              + '</div>'
                              + '</div>'
                              + '</div>');
      console.log($(`#member${count}`).val());
    }
  });

  $("#title").on("blur", function(){
    if($(this).val() != ""){
      $("#title").removeClass().addClass("input column is-half");
    }
  });

  $("#catch_copy").on("blur", function(){
    if($(this).val() != ""){
      $("#catch_copy").removeClass().addClass("input column is-half");
    }
  });

  $("#detail").on("blur", function(){
    if($(this).val() != ""){
      $("#detail").removeClass().addClass("textarea");
    }
  });

  $("#image").on("change", function(){
    if($(this).val() != ""){
      $("#file-name").css("border-color", "hsl(0, 0%, 86%)");
    }
  });

  $("#period").on("blur", function(){
    if($(this).val() != ""){
      $("#period").removeClass().addClass("input");
    }
  });

  $("#represent").on("blur", function(){
    if($(this).val() != ""){
      $("#represent").removeClass().addClass("input column is-half");
    }
  });

  $("#team").on("blur", function(){
    if($(this).val() != ""){
      $("#team").removeClass().addClass("input column is-half");
    }
  });

  $(document).on("blur", "#othergenre", function(){
    if($(this).val() != ""){
      $("#othergenre").removeClass().addClass("input column is-half");
    }
  });

  $("#genre").on("change", function(){
    if($(this).val() == "その他"){
      $("#genrefield").append('<div class="field is-horizontal" id="otherform">'
                              + '<div class="field-label is-normal"></div>'
                              + '<div class="field-body">'
                              + '<div class="field">'
                              + '<div class="control">'
                              + '<input class="input column is-half" type="text" id="othergenre" maxlength="30" placeholder="ジャンル名を入力してください">'
                              + '</div>'
                              + '</div>'
                              + '</div>'
                              + '</div>');
    }
    if($(this).val() != "その他"){
      $("#otherform").remove();
    }

  });



  $('#registration_form').on("submit", function() {
    var submitflg = true;

    $("#attention").remove();

    if($("#title").val() == ""){
      $("#title").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if($("#catch_copy").val() == ""){
      $("#catch_copy").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if($("#detail").val() == ""){
      $("#detail").removeClass().addClass("textarea is-danger");
      submitflg = false;
    }

    if($("#image").val() == ""){
      $("#file-name").css("border-color", "hsl(348, 86%, 61%)");
      submitflg = false;
    }
    if($("#period").val() == ""){
      $("#period").removeClass().addClass("input is-danger");
      submitflg = false;
    }

    if($("#represent").val() == ""){
      $("#represent").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if($("#team").val() == ""){
      $("#team").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if($("#othergenre").val() == ""){
      $("#othergenre").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if(submitflg){
      if($("#genre").val() == "その他"){
        $("#other").val($("#othergenre").val());
      }
    }else{
      // $("#attention-field").append('<div class="container"  >'
      //                             + '<div class="box content column is-5 is-offset-one-quarter">'
      //                             + '<label class="label column is-offset-3" style="color:hsl(348, 86%, 61%);font-weight:bold;">必須項目が入力されていません</label>'
      //                             + '</div>'
      //                             + '</div>');
      $("#attention-field").append('<article class="message is-danger column is-two-thirds" id="attention">'
                                  + '<div class="message-header">'
                                  + '<p>エラー</p>'
                                  + '</div>'
                                  + '<div class="message-body">'
                                  + '<label class="label column is-offset-4" style="color:hsl(348, 86%, 61%);font-weight:bold;">必須項目が入力されていません</label>'
                                  + '</div>'
                                  + '</article>');
    }

    return submitflg;
  });
