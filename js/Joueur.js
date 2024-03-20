//recuperer les donner et les mettre dans la base de donnee avec AJAX-->
document.getElementById("loadind").addEventListener("click", function(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                document.getElementById("result").innerHTML = xhr.responseText;
            } else {
                alert("Une erreur s'est produite lors du chargement des données.");
            }
        }
    };
    xhr.open("GET", "joueur.php", true);
    xhr.send();
});
