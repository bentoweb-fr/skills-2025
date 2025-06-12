// console.log("scrollzoom.js FILE");
document.addEventListener("DOMContentLoaded", () => {
  // console.log("scrollzoom.js DOMContentLoaded");
  const scrollContainer = document.querySelector(".boxcart");
  const boxes = scrollContainer.querySelectorAll(".box");
  // console.log("boxes", boxes);
  // let activeBox = null;
  // const zoomOff = 0.8;
  const wildLimit = 150;
  const marginOn = 0;
  const marginOff = 40;

  const data = {
    date: null,
  };

  // const scroller = document.querySelector(".scroller");
  // const scrollerInner = scroller.querySelector(".scroller-pusher");
  // scrollerInner.style.height = `${scrollContainer.scrollHeight}px`;

  // const showButton = document.querySelector(".show-more");
  // showButton.addEventListener("click", () => {
  //   if (activeBox) {
  //     activeBox.classList.toggle("is--open");
  //     updateShowButton();
  //   }
  // });

  boxes.forEach((box) =>
    box.addEventListener("click", () => {
      // console.log("box click");
      if (!box.classList.contains("is--active")) {
        // scrollContainer.scrollTo(box.getBoundingClientRect().top - 50, 2000);
        const targetScroll = box.offsetTop - window.innerHeight / 2 + 50;
        scrollContainer.scrollTo(0, targetScroll);
      }
      // box.classList.toggle("is--open");
      onScroll();
    })
  );

  let ticking = false;

  function onScroll() {
    // console.log("onScroll");
    if (!ticking) {
      requestAnimationFrame(() => {
        const containerRect = scrollContainer.getBoundingClientRect();
        const blockCenter = containerRect.top + containerRect.height / 2;

        // const scrollPos = (scroller.getBoundingClientRect().height + scroller.scrollTop) / scrollerInner.getBoundingClientRect().height;
        // console.log(scrollPos);

        boxes.forEach((box) => {
          console.log("box");
          const boxRect = box.getBoundingClientRect();
          const boxCenter = boxRect.top + boxRect.height / 2;
          const boxHeight = boxRect.height;
          const distance = Math.abs(blockCenter - boxCenter);
          const limit = boxHeight / 2;
          const boxInner = box.querySelector(".box-inner");
          if (distance < limit) {
            /**
             * IN
             */
            // box.style.marginLeft = margin + "px";
            // box.style.zoom = 1;
            // box.style.opacity = 1;
            // boxInner.style.paddingLeft = `${marginOn}px`;
            // boxInner.style.paddingRight = `${marginOn}px`;
            boxInner.style.marginLeft = `${marginOn}px`;
            boxInner.style.marginRight = `${marginOn}px`;
            // activeBox = box;
            box.classList.add("is--active");

            // const date = box.dataset.date;
            // if (date && date != data.date) {
            dateMoveTo(box);
            // }
          } else if (distance < limit + wildLimit) {
            /**
             * TRANSITION
             */
            const percent = (limit + wildLimit - distance) / wildLimit;
            // box.style.zoom = zoomOff + percent * (1 - zoomOff);
            // box.style.opacity = zoomOff + percent * (1 - zoomOff);
            // box.style.marginLeft = margin * percent + "px";
            const m = (marginOn - marginOff) * percent + marginOff;
            // boxInner.style.paddingLeft = `${m}px`;
            // boxInner.style.paddingRight = `${m}px`;
            boxInner.style.marginLeft = `${m}px`;
            boxInner.style.marginRight = `${m}px`;
            box.classList.remove("is--active");
          } else {
            /**
             * OUT
             */
            // box.style.marginLeft = "0px";
            box.classList.remove("is--active");
            // box.style.zoom = zoomOff;
            // box.style.opacity = zoomOff;
            // boxInner.style.paddingLeft = `${marginOff}px`;
            // boxInner.style.paddingRight = `${marginOff}px`;
            boxInner.style.marginLeft = `${marginOff}px`;
            boxInner.style.marginRight = `${marginOff}px`;
          }
        });

        ticking = false;
      });
      ticking = true;
    }
  }

  const dateBlock = document.querySelector(".skills-date");
  const currentDate = dateBlock.querySelector(".current-date");
  const nextDate = dateBlock.querySelector(".next-date");
  // const datesCart = dateBlock.querySelector(".dates-cart");
  function dateMoveTo(box = null) {
    if (!box) {
      return false;
    }
    const prevDate = data.date;
    const newDate = box.dataset.date || "0000";

    if (newDate == prevDate) {
      return false;
    }

    data.date = newDate;
    currentDate.innerHTML = prevDate;
    nextDate.innerHTML = newDate;
    // dateBlock.classList.remove("m--moveNext");
    // dateBlock.classList.remove("m--movePrev");
    if (newDate > prevDate) {
      dateBlock.classList.add("m--forward");
    } else if (newDate < prevDate) {
      dateBlock.classList.add("m--backward");
    }
    setTimeout(() => {
      dateBlock.classList.add("move");
    }, 1);
    setTimeout(() => {
      currentDate.innerHTML = newDate;
      dateBlock.classList.remove("m--forward");
      dateBlock.classList.remove("m--backward");
      setTimeout(() => {
        dateBlock.classList.remove("move");
      }, 1);
    }, 210);

    // updateShowButton();
  }

  /*
  function updateShowButton() {
    const contents = activeBox.querySelector(".plus");
    // console.log(!!contents);
    if (!!contents) {
      activeBox.classList.remove("no-plus");
    } else {
      activeBox.classList.add("no-plus");
    }
    if (activeBox && activeBox.classList.contains("is--open")) {
      showButton.classList.add("m--close");
    } else {
      showButton.classList.remove("m--close");
    }
  }
  */

  // updateShowButton();
  scrollContainer.addEventListener("scroll", onScroll);
  // scroller.addEventListener("scroll", onScroll);
  onScroll(); // initial call

  //   fetch("https://api.skills2025.local/api/projects", {
  //     method: "GET",
  //     credentials: "include", // si tu utilises des cookies/session
  //   })
  //     .then((response) => {
  //       if (!response.ok) throw new Error("Erreur HTTP " + response.status);
  //       return response.json();
  //     })
  //     .then((data) => {
  //       console.log("Données reçues:", data);
  //     })
  //     .catch((error) => {
  //       console.error("Erreur lors de la récupération des données:", error);
  //     });
});
