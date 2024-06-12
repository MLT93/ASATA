import "./Nav.scss";
import { Button } from "../Button/Button";
import { Link } from "../Link/Link";
import { FaPhone } from "react-icons/fa6";
import { Box } from "../Structure/Box";
import PersonIcon from "../../assets/Icons/PersonIcon";
import Logo from "../../assets/Icons/Logo";
import { FaRegLightbulb, FaSolarPanel } from "react-icons/fa";
import { BsFillPeopleFill, BsBatteryCharging } from "react-icons/bs";
import { LuBadgeHelp } from "react-icons/lu";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Nav = (): JSX.Element => {
  return (
    <>
      <header className="head">
        <nav className="nav">
          <Box isFlexRowCenter alignItems="center" gap="5">
            <Link svg={<Logo width="17" />} text="" href="" />
            <Box isFlexRowCenter alignItems="center" gap="5">
              <ul className="nav-list">
                <li>
                  <Link isAnchorPrimary text="Hogar" svg="" href="" isTarget />
                </li>
                <li>
                  <Link
                    isAnchorPrimary
                    text="Negocios"
                    svg=""
                    href=""
                    isTarget
                  />
                </li>
                <li>
                  <Link
                    isAnchorPrimary
                    text="Comunidades"
                    svg=""
                    href=""
                    isTarget
                  />
                </li>
                <li>
                  <Link
                    isAnchorPrimary
                    text="Grandes Clientes"
                    svg=""
                    href=""
                    isTarget
                  />
                </li>
                <li>
                  <Link
                    isAnchorPrimary
                    text="¿Hablamos?"
                    svg={<FaPhone />}
                    gap="0.5"
                    href=""
                    isTarget
                  />
                </li>
              </ul>
              <Button
                text="Area Clientes"
                gap="0.5"
                svg={<PersonIcon color="var(--color-secondary)" width="1.5" />}
                isTertiary
                onClick={() => console.log(`clicked on nav button`)}
              />
            </Box>
          </Box>
        </nav>
        <Box
          isFlexRowCenter
          alignItems="center"
          gap="5"
          height="57"
          bg="var(--color-background)">
          <Box
            className="border-separation-top"
            isFlexRowCenter
            alignItems="center"
            gap="3">
            <Link
              isAnchorSecondary
              color="var(--color-secondary)"
              text="Luz"
              href=""
              svg={<FaRegLightbulb />}
            />
            <Link
              isAnchorSecondary
              text="Programa Amigos"
              href=""
              svg={<BsFillPeopleFill />}
            />
            <Link
              isAnchorSecondary
              text="Batería Virtual"
              href=""
              svg={<BsBatteryCharging />}
            />
            <Link
              isAnchorSecondary
              text="Solar"
              href=""
              svg={<FaSolarPanel />}
            />
            <Link
              isAnchorSecondary
              text="Ayuda"
              href=""
              svg={<LuBadgeHelp />}
            />
          </Box>
        </Box>
      </header>
    </>
  );
};

export { Nav };
