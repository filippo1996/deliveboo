export default function slug(str){
  const array =  str.split(' ');
  return array.join('-').toLowerCase();
}