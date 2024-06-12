import "./Dev.module.scss";
import { Button } from "../../components/03_Button/Button";
import { Link } from "../../components/02_Link/Link";
import { Text } from "../../components/01_Text/Text";
import IconExample2 from "../../assets/icons/02_Example2_img";
import { Card } from "../../components/04_Card/Card";
import IconExample1 from "../../assets/icons/01_Example1_svgAnimated";
import { Section } from "../../components/05_PageStructure/Section/Section";

const Dev = () => {
  return (
    <>
      <aside>
        <h3>Aside</h3>
      </aside>
      <main>
        <Section>
          <Text size="h1" text="h1" />
          <Text size="h1_bold" text="h1_bold" />
          <Text size="h2" text="h2" />
          <Text size="h2_bold" text="h2_bold" />
          <Text size="h3" text="h3" />
          <Text size="h3_bold" text="h3_bold" />
          <Text size="h4" text="h4" />
          <Text size="h4_bold" text="h4_bold" />
          <Text size="h5" text="h5" />
          <Text size="h5_bold" text="h5_bold" />
          <Text size="pa" text="pa" />
          <Text size="pa_bold" text="pa_bold" />
          <Text size="an" text="an" />
          <br />
          <Text size="sp" text="sp" />
          <br />
          <Text size="sp_bold" text="sp_bold" />
          <hr />
          <article>
            <Link isAnchorPrimary text="Link Primary" href="###" isTarget />
            <Link
              isAnchorSecondary
              svg={<IconExample2 width="3" />}
              text="Link Secondary"
              href="###"
              isSelf
            />
            <Link isAnchorTertiary text="Link Tertiary" href="###" isTarget />
          </article>
          <hr />
          <Button text="Button Basic" onClick={() => console.log("Button")} />
          <Button
            isPrimary
            text="Button Primary"
            onClick={() => console.log("Button Primary")}
          />
          <Button
            isSecondary
            text="Button Secondary"
            onClick={() => console.log("Button Secondary")}
          />
          <Button
            isTertiary
            text="Button Tertiary"
            onClick={() => console.log("Button Tertiary")}
          />
          <hr />
          <Card
            isCardPrimary
            svgCard={<IconExample2 width="5" />}
            preTitle="preTitle"
            title="Title"
            subtitle="Subtitle"
            body="Body"
            textButton="textButton"
            svgButton={<IconExample1 width="3" />}
            onClick={() => console.log("Button Card")}
          />
        </Section>
      </main>
    </>
  );
};

export { Dev };
