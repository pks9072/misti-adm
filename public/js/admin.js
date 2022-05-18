"use strict";

const moreBtn = document.querySelectorAll(".more");
const hiddenMenu = document.querySelectorAll(".hidden_list");
const icons = document.querySelectorAll(".arrow");

// 어코디언 메뉴
// event listener
moreBtn.forEach(function (el) {
  el.addEventListener("click", toggleAccordion);
});

// function
function toggleAccordion(el) {
  let targetIcon = el.currentTarget.children[0].children[1];
  let targetMenu = el.currentTarget.children[1];

  if (targetMenu.matches(".show")) {
    targetMenu.classList.remove("show");
    targetIcon.classList.remove("rotate");
  } else {
    moreBtn.forEach((el) => {
      el.children[1].classList.remove("show");
    });
    icons.forEach((el) => {
      el.classList.remove("rotate");
    });
    targetMenu.classList.add("show");
    targetIcon.classList.add("rotate");
  }
}

// 유저 버튼
const useBtn = document.querySelector(".user_btn");
const signOutMenu = document.querySelector(".logout");

useBtn.addEventListener("click", () => {
  signOutMenu.classList.toggle("user_active");
});

// 메뉴 숨김

const header = document.querySelector(".admin_container");
const sideMenu = document.querySelector(".side_gnb_container");
const hideBtn = document.querySelector(".menu_hide");

hideBtn.addEventListener("click", () => {
  header.classList.toggle("header_hide");
  sideMenu.classList.toggle("gnb_hide");
});
