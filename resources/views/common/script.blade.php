<script>
    $(document).ready(function(){
        $(".more").click(function(){

            if( $(this).attr("data-id")=='1')
            {

            }else{

                $(".more").attr("data-id","0");
                $(this).attr("data-id","1");
                $(".hidden_list").removeClass("show");
                $(this).find(".hidden_list").addClass("show");
            }
        });
    });
</script>
