export function getPositionThreshold(element, threshold){
  if ((100/window.innerHeight) * element.getBoundingClientRect().bottom > threshold){
    return true;
  }
  return false;
}
