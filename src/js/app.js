/*
!(i) 
Код попадает в итоговый файл,
только когда вызвана функция,
например flsFunctions.spollers();
Или когда импортирован весь файл,
например import "files/script.js";
Неиспользуемый (не вызванный)
код в итоговый файл не попадает.

Если мы хотим добавить модуль
следует его расскоментировать
*/
import {
  isWebp,
  headerFixed,
  togglePopupWindows,
  addTouchClass,
  addLoadedClass,
  menuInit,
} from './modules'

import { firstSlider } from './helpers/elementsNodeList'
/* Раскомментировать для использования */
// import { MousePRLX } from './libs/parallaxMouse'

/* Раскомментировать для использования */
// import AOS from 'aos'

/* Раскомментировать для использования */
import Swiper, { Pagination, Autoplay } from 'swiper'

// Включить/выключить FLS (Full Logging System) (в работе)
window['FLS'] = true

/* Проверка поддержки webp, добавление класса webp или no-webp для HTML
! (i) необходимо для корректного отображения webp из css 
*/
isWebp()
/* Добавление класса touch для HTML если браузер мобильный */
/* Раскомментировать для использования */
// addTouchClass();
/* Добавление loaded для HTML после полной загрузки страницы */
/* Раскомментировать для использования */
// addLoadedClass();
/* Модуль для работы с меню (Бургер) */
/* Раскомментировать для использования */
// menuInit()

/* Библиотека для анимаций ============================================================================================================================
 *  документация: https://michalsnik.github.io/aos
 */
// AOS.init();
// ====================================================================================================================================================

// Паралакс мышей =====================================================================================================================================
// const mousePrlx = new MousePRLX({})
// ====================================================================================================================================================

// Фиксированный header ===============================================================================================================================
headerFixed()
// ====================================================================================================================================================

/* Открытие/закрытие модальных окон ===================================================================================================================
* Чтобы модальное окно открывалось и закрывалось
* На окно повешай атрибут data-type="<название окна>"
* И на кнопку, которая вызывает окно так же повешай атрибут data-type="<название окна>"

* На обертку(враппер) окна добавь класс _overlay-bg
* На кнопку для закрытия окна добавь класс button-close
*/
/* Раскомментировать для использования */
// togglePopupWindows()
// ====================================================================================================================================================
togglePopupWindows()

let firstMobileSlider
const mobileSliderInit = () => {
  if (window.innerWidth <= 540 && firstSlider.dataset.mobile === 'false') {
    firstMobileSlider = new Swiper(firstSlider, {
      modules: [Pagination],
      slidesPerView: 1,
      centeredSlides: true,
      direction: 'horizontal',
      spaceBetween: 15,
      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
    })

    firstSlider.dataset.mobile = 'true'
  }

  if (window.innerWidth > 540) {
    firstSlider.dataset.mobile = 'false'

    if (firstSlider.classList.contains('swiper-initialized')) {
      firstMobileSlider.destroy()
    }
  }
}

new Swiper('.slider-auto', {
  modules: [Pagination, Autoplay],
  direction: 'horizontal',
  autoplay: {
    delay: 1500,
  },
  speed: 2000,
  grabCursor: true,
  loop: false,
  spaceBetween: 20,
  slidesPerView: 'auto',
  pagination: {
    el: '.swiper-pagination',
    type: 'progressbar',
  },
})

mobileSliderInit()

window.addEventListener('resize', () => {
  mobileSliderInit()
})
