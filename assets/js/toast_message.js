function showToast(message) {
    var toast = document.createElement("div");
    toast.style.backgroundColor = "#4CAF50";
    toast.style.color = "#fff";
    toast.style.padding = "16px";
    toast.style.borderRadius = "5px";
    toast.style.position = "fixed";
    toast.style.top = "30px";
    toast.style.right = "30px";
    toast.innerHTML = message;
    document.body.appendChild(toast);
    setTimeout(function(){ document.body.removeChild(toast); }, 5000);
  }  