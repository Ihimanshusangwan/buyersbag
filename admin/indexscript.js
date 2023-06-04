$("#insertion-btn").click(function () {
    $("#insert-form").show(900);
});
$("#close-btn").click(function () {
    $("#insert-form").hide(1000);
});
//     element.addEventListener('click',function(e){
//         e.preventDefault();
//         console.log("clicked");
//         let form = element.parentnode;
//         var data = new FormData(form);
//         const xhr = new XMLHttpRequest();
//         xhr.open("POST","deleteitem.php",true);
//         xhr.onreadystatechange = function(){
//             if(xhr.readyState==4){
//                 if(xhr.status==200){
//                     document.getElementById("del-info-show").innerHTML = xhr.responseText;
//                 }
//             }
//         };
//         xhr.send(data);
//     })
// });

