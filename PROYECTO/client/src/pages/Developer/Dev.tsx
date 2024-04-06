/* import styles from "./Dev.module.scss" */
import { Link } from "../../components/Link/Link";
import { Text } from "../../components/Text/Text";

const Dev = () => {
  return (
    <>
      <Text size="h1" text="H1" />
      <Text size="h2" text="H2" />
      <Text size="h3" text="H3" />
      <Text size="h4" text="H4" />
      <Text size="h5" text="H5" />
      <Text size="p" text="P" />
      <Text size="a" text="A" />
      <Text size="sp-bold" text="Sp" />
      <hr />
      <Link text="Link" href="###" isAnchorPrimary />
    </>
  );
};

export { Dev };
