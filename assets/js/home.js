document.querySelectorAll('.follow').forEach((element)=> {
    element.addEventListener('click', (e) =>{
        element.classList.toggle('following');
        console.log(e.target.dataset.id);
        console.log(e.target.innerHTML);
        e.target.disabled = true;
        let url = "/follow/follow.php";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == 1){
                    e.target.innerHTML = "Requested";
                }
                else{
                    e.target.innerHTML = "Followed";
                }
                console.log(xhr.responseText);
            }
        };
        // let data = JSON.stringify(obj);
        xhr.send("id="+e.target.dataset.id+"&follow=follow");
    })
})
document.querySelectorAll('.like').forEach((element)=> {
    element.addEventListener('click', (e) =>{
        e.target.disabled = true;
        let url = "/post/like.php";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            e.target.classList.add('active-like');
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == 1){
                    e.target.classList.remove('liked');
                    document.querySelector('.active-like + .like-count').innerHTML = parseInt(document.querySelector('.active-like + .like-count').innerHTML) - 1;
                }
                if (xhr.responseText == 2){
                    e.target.classList.add('liked');
                    document.querySelector('.active-like + .like-count').innerHTML = parseInt(document.querySelector('.like-count').innerHTML) + 1;
                }
                console.log(xhr.responseText);
                e.target.classList.remove('active-like');
            }
        };
        // let data = JSON.stringify(obj);
        xhr.send("id="+e.target.dataset.id+"&like=like");
    })
})