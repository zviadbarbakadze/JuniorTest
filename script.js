function products(types){
    
    let div_for_dvd=document.getElementById("div_for_dvd");
    let div_for_book=document.getElementById("div_for_book");
    let div_for_furniture=document.getElementById("div_for_furniture");

    div_for_dvd.style.display="none";
    div_for_book.style.display="none";
    div_for_furniture.style.display="none";

    if(types=="dvdValue"){
        div_for_dvd.style.display="block";
        
    }else if(types=="bookValue"){
        div_for_book.style.display="block";
    }else if(types=="furnitureValue"){
        div_for_furniture.style.display="block";
    }
}