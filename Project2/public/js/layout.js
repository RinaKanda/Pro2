
        function select(name,id){
            $('#selected').text(name);  
            $('#selectedd').text("");
            // console.log(id);
            $("#place").val(id);
            $("*").removeClass("selectedd");   
            $("#date").val("");
            if($("#date").val() == ""){
                document.getElementById("button").disabled = true;
            }
        }
        function selectt(day,mark,placeI,placeN){
            // console.log(mark);
            // console.log(placeN);
            if(mark !=="✕"){
                if($('.selected').id != placeI){
                    $("*").removeClass("selected");
                    $('#' + placeI).addClass("selected");
                   
                }
                $('#selectedd').text(day);
                $('#selected').text(placeN); 
                $('#date').val(day);
                $("#place").val(placeI);
                
                //どちらも選択されたら
                if(($('#selected').text() != "") && ($('#selected').text() != "")){
                    // console.log("tuua");
                    document.getElementById("button").disabled = false;
                }
            } else {
                alert(placeN + "の" + day +"は空きがありません！");
                // $('#selectedd').text("");
            }
           
        }

        $(function(){
            // $('.menu-trigger').on('click',function(){
            //     if($(this).hasClass('active')){
            //         $(this).removeClass('active');
            //         $('nav').removeClass('open');
            //         $('.overlay').removeClass('open');
            //     } else {
            //         $(this).addClass('active');
            //         $('nav').addClass('open');
            //         $('.overlay').addClass('open');
            //     }
            // });
            $('.menu-trigger').on('click',function(){
                $(".reser").toggle();
                
            });
            // $('.overlay').on('click',function(){
            //     if($(this).hasClass('open')){
            //         $(this).removeClass('open');
            //         $('.menu-trigger').removeClass('active');
            //         $('nav').removeClass('open');      
            //     }
            // });

            $('.sub-menu').click(function(){
                $("*").removeClass("selected");

                $(this).addClass("selected");               
                // $("*").removeClass('sub-menu-nav-ac');
                // $(this).siblings().removeClass('not-active');
                // if($(".sub-menu-nav").is(':visible')){
                //     $(".sub-menu-nav").is(':visible').toggle();
                // }
                
               
                $(this).siblings().addClass("open");
                $(this).siblings().toggle();
                
            });


            $('.res').click(function () {
                if(this.id !== "✕"){    
                    $("*").removeClass("selectedd");            
                    $(this).addClass("selectedd");
                }
            });
        // });
        });
