const search = document.getElementById("search");
const results = document.getElementById("results");

search.addEventListener("input", () => {
 const inputValue = search.value;
 console.log("Contenu :", inputValue);

 fetch("../search.php?searchTerm=" + encodeURIComponent(inputValue))
   .then((response) => response.json())
   .then((data) => {
     console.log(data);
     let resultsDiv = document.getElementById("results");
     resultsDiv.innerHTML = ''; 
     data.forEach((item) => {
       let li = document.createElement("li");
       li.textContent = `${item.title} - ${item.cast}`;
       resultsDiv.appendChild(li);
     });
   })
   .catch((error) => console.error("Error:", error));
});