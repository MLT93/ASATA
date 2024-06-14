import "./Swiper.scss";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

const SwiperComponent: React.FC = () => {
  const settings = {
    dots: true,
    infinite: true,
    speed: 900,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnHover: true,
    arrows: false,
  };

  return (
    <div className="slide_container">
      <Slider {...settings}>
        <div className="slide">
          <div className="slide_content">
            <video autoPlay preload="metadata" loop muted>
              <source
                src="/publi-rebajas.mp4"
                type="video/mp4"
              />
            </video>
          </div>
        </div>
        <div className="slide">
          <div className="slide_content">
            <video autoPlay preload="metadata" loop muted>
              <source src="/publi-gorras.mp4" type="video/mp4" />
            </video>
          </div>
        </div>
      </Slider>
    </div>
  );
};

export { SwiperComponent };
