module.exports = {
  env: {
    browser: true,
    es2021: true,
    "vue/setup-compiler-macros": true,
  },
  extends: ["plugin:vue/recommended", "airbnb-base"],
  parserOptions: {
    ecmaVersion: "latest",
    sourceType: "module",
  },
  plugins: ["vue"],
  globals: {
    route: "readonly",
  },
  rules: {
    "max-len": ["error", 180],
    "vue/no-multiple-template-root": "off",
    "vetur.validation.style": false,
    "vetur.validation.template": false,
    "vetur.validation.script": false,
  },
};
