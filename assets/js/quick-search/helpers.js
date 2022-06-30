export function deepCopy(input) {
  if (typeof input === "array") return [...input];
  if (typeof input === "object") return JSON.parse(JSON.stringify(input));
}