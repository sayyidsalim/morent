// animasi untuk fitur like dan lain lain dalam header..
let fa = document.getElementsByClassName("fa-solid")
for (let i = 0; i < fa.length; i++) {
  fa[i].addEventListener("click",function()
  {
    fa[i].classList.toggle("text-red-500");
  });
};
// tombol click untuk menampilkan kembali like dan setting
const user = document.getElementById("user")

user.addEventListener('click',function()
{
  const li = document.getElementsByClassName("list")
  for(let i = 0; i<li.length;i++)
  {
    li[i].classList.toggle("max-[767px]:hidden");
  }
});

// element flip untuk card
const card = document.getElementsByClassName("card");
for(let i = 0; i<card.length; i ++)
{
  card[i].addEventListener('mouseover',function()
  {
   card[i].classList.toggle("rote")
  });
}