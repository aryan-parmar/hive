document.querySelectorAll(".profile_edit").forEach((element) => {
  element.addEventListener("click", (e) => {
    e.target.disabled = true;
    console.log(e.target.dataset.id);
    if (e.target.dataset.follow == 0) {
      let url = "/follow/follow.php";
      let xhr = new XMLHttpRequest();
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          if (xhr.responseText == 1) {
            e.target.innerHTML = "Pending";
          } else {
            e.target.innerHTML = "Followed";
          }
          console.log(xhr.responseText);
          e.target.dataset.follow = 1;
          e.target.disabled = false;
        }
      };
      // let data = JSON.stringify(obj);
      xhr.send("id=" + e.target.dataset.id + "&follow=follow");
    }
    if (e.target.dataset.follow == 1) {
      let url = "/follow/unfollow.php";
      let xhr = new XMLHttpRequest();
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          if (xhr.responseText == 1) {
            e.target.innerHTML = "Follow";
          }
          e.target.dataset.follow = 0;
          e.target.disabled = false;
        }
      };
      xhr.send("id=" + e.target.dataset.id + "&unfollow=unfollow");
    }
  });
});

document.querySelectorAll(".post_delete").forEach((element) => {
  element.addEventListener("click", (e) => {
    e.target.disabled = true;
    console.log(e.target.dataset.id);
    let url = "/post/delete.php";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        if (xhr.responseText == 1) {
          window.location.reload();
        }
      }
    };
    xhr.send("id=" + e.target.dataset.id + "&delete=delete");
  });
});
