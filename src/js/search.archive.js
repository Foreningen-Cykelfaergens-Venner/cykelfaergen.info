const searchForm = document.querySelector(".search");
const searchValue = document.querySelector(".search__select");

searchValue.addEventListener("change", function(){
    searchForm.submit();
})