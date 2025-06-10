const ScrollZoomService = {
  scrollContainer: null,
  boxes: [],
  activeBox: null,
  wildLimit: 150,
  marginOn: 0,
  marginOff: 40,
  data: {
    date: null,
  },
  dateBlock: null,
  currentDate: null,
  nextDate: null,
  ticking: false,

  init() {
    this.scrollContainer = document.querySelector(".boxcart");
    this.boxes = document.querySelectorAll(".box");
    this.dateBlock = document.querySelector(".skills-date");
    this.currentDate = this.dateBlock.querySelector(".current-date");
    this.nextDate = this.dateBlock.querySelector(".next-date");

    this.boxes.forEach((box) =>
      box.addEventListener("click", () => {
        if (!box.classList.contains("is--active")) {
          const targetScroll = box.offsetTop - window.innerHeight / 2 + 50;
          this.scrollContainer.scrollTo(0, targetScroll);
        }
        this.onScroll();
      })
    );

    this.scrollContainer.addEventListener("scroll", () => {
      this.onScroll();
    });
    this.onScroll();
  },

  onScroll() {
    requestAnimationFrame(() => {
      const containerRect = this.scrollContainer.getBoundingClientRect();
      const screenCenter = containerRect.top + containerRect.height / 2;

      let count = 0;

      this.boxes.forEach((box) => {
        /**
         * Calcule la box la plus proche du centre de l'écran
         */
        const boxRect = box.getBoundingClientRect();
        const limit = boxRect.height / 2 - 1;
        const boxCenter = boxRect.top + limit;
        const distance = Math.abs(screenCenter - boxCenter);
        const boxInner = box.querySelector(".box-inner");
        if (distance < limit && count < 1) {
          count++;
          if (this.activeBox != box) {
            boxInner.style.marginLeft = `${this.marginOn}px`;
            // boxInner.style.marginRight = `${this.marginOn}px`;
            this.activeBox?.classList.remove("is--active");
            this.activeBox = box;
            this.activeBox.classList.add("is--active");
            this.dateMoveTo(box);
          }
        } else if (distance < limit + this.wildLimit) {
          const percent = (limit + this.wildLimit - distance) / this.wildLimit;
          const m = (this.marginOn - this.marginOff) * percent + this.marginOff;
          boxInner.style.marginLeft = `${m}px`;
          // boxInner.style.marginRight = `${m}px`;
        } else {
          boxInner.style.marginLeft = `${this.marginOff}px`;
          // boxInner.style.marginRight = `${this.marginOff}px`;
        }
      });
    });
  },

  dateMoveTo(box = null) {
    if (!box) {
      return false;
    }
    const prevDate = this.data.date;
    const newDate = box.dataset.date || "0000";
    if (newDate == prevDate) {
      return false;
    }
    this.data.date = newDate;
    this.currentDate.innerHTML = prevDate;
    this.nextDate.innerHTML = newDate;
    if (newDate > prevDate) {
      this.dateBlock.classList.add("m--forward");
    } else if (newDate < prevDate) {
      this.dateBlock.classList.add("m--backward");
    }
    setTimeout(() => {
      this.dateBlock.classList.add("move");
    }, 1);
    setTimeout(() => {
      this.currentDate.innerHTML = newDate;
      this.dateBlock.classList.remove("m--forward");
      this.dateBlock.classList.remove("m--backward");
      setTimeout(() => {
        this.dateBlock.classList.remove("move");
      }, 1);
    }, 125);
  },
};
export { ScrollZoomService };
