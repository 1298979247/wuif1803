$(function(){
    //删除功能
    $("ul").on('click','.remove',function(){
        var id=$(this).closest('li').attr('data-id');
        console.log(id);
        $.ajax({
            url: 'admin.php',
            data:{
                id:id,
                action:"delete",
                class:"news",
            },
            success:function(data){
                if (data == '1') {
                    alert('删除成功')
                    location.reload();
                } else {
                    alert('网络出了点问题')
                }
            }
        })
    })



    //增添功能
    $("button").on("click",function(){
        $title=$("#title").val();
        $des=$("#des").val();
        $con=$("#con").val();
        console.log($title);
        console.log($des);
        console.log($con);
        $.ajax({
            url:"admin.php",
            data:{
                action:"insert",
                title:$title,
                des:$des,
                con:$con,
                class:"news",
            },
            success:function(data){
                if(data=='1'){
                    alert('数据添加成功');
                    location.reload();
                }
                else{
                    alert('网络除了点下问题')
                }
            }
        })
    })


    //修改功能
    $("ul").on("blur","input",function () {
        $class=$(this).attr('class');
        $id=$(this).closest("li").attr("data-id");
        $valu=$(this).val();
        console.log(x);
        // $.ajax({
        //     url:"update.php",
        //     data:{
        //         id:$id,
        //         class:$class,
        //         valu:$valu,
        //     },
        //     success:function(data){
        //         if(data!="1"){
        //             alert("数据修改失败")
        //         }
        //     }
        // })
    })

})