Vue.config.devtools = true;

Vue.component('cardteam', {
    template: `
        <div class="card-wrap-team-4"
            @mousemove="handleMouseMove"
            @mouseenter="handleMouseEnter"
            @mouseleave="handleMouseLeave"
            ref="cardteam">
            <div class="cardteam"
                :style="cardStyle">
                <slot name="premium"></slot>
                <slot name="link"></slot>
                <slot name="posting">
                </slot>
                <div class="card-bg-team-4" :style="[cardBgTransform, cardBgImage]"></div>
                <div class="card-info-team-4">
                <slot name="header"></slot>
                <slot name="content"></slot>
                </div>
            </div>
        </div>`,
    mounted() {
        this.width = this.$refs.cardteam.offsetWidth;
        this.height = this.$refs.cardteam.offsetHeight;
    },
    props: ['dataImage'],
    data: () => ({
        width: 0,
        height: 0,
        mouseX: 0,
        mouseY: 0,
        mouseLeaveDelay: null
    }),
    computed: {
        mousePX() {
            return this.mouseX / this.width;
        },
        mousePY() {
            return this.mouseY / this.height;
        },
        cardStyle() {
            const rX = this.mousePX * 30;
            const rY = this.mousePY * -30;
            return {
                transform: `rotateY(${rX}deg) rotateX(${rY}deg)`
            };
        },
        cardBgTransform() {
            const tX = this.mousePX * -40;
            const tY = this.mousePY * -40;
            return {
                transform: `translateX(${tX}px) translateY(${tY}px)`
            }
        },
        cardBgImage() {
            return {
                backgroundImage: `url(${this.dataImage})`
            }
        }
      },
    methods: {
        handleMouseMove(e) {
            this.mouseX = e.pageX - this.$refs.cardteam.offsetLeft - this.width/2;
            this.mouseY = e.pageY - this.$refs.cardteam.offsetTop - this.height/2;
        },
        handleMouseEnter() {
            clearTimeout(this.mouseLeaveDelay);
        },
        handleMouseLeave() {
            this.mouseLeaveDelay = setTimeout(()=>{
                this.mouseX = 0;
                this.mouseY = 0;
            }, 1000);
        }
    }
});

const app = new Vue({
  el: '#testingVue'
});
