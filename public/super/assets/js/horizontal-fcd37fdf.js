import{A as P,u as V,b as w,o as H,e as M,_ as O}from"./index-5e2104fc.js";import{d as L,_ as j,j as v,G as E,ag as l,o as s,c as u,V as r,P as a,F as h,a8 as F,O as k,a as C,U as p,u as N,aa as U,T as g,a3 as G,aQ as Q}from"./@vue-110897a1.js";import{u as q,o as J}from"./vue-router-17193735.js";import{s as y}from"./pinia-cd41b998.js";import"./vue-i18n-c25bb36f.js";import"./@intlify-d9393dcf.js";import"./vue-cc729cf0.js";import"./js-cookie-edb2da2a.js";import"./@element-plus-ff880098.js";import"./nprogress-28073a82.js";import"./axios-28bc18a3.js";import"./element-plus-28d330eb.js";import"./lodash-es-21c98b27.js";import"./@vueuse-0a258a1c.js";import"./@popperjs-c75af06c.js";import"./@ctrl-f8748455.js";import"./dayjs-816b3f93.js";import"./async-validator-dee29e8b.js";import"./memoize-one-297ddbcb.js";import"./escape-html-72afddb3.js";import"./normalize-wheel-es-ed76fb12.js";import"./@floating-ui-432baded.js";import"./lodash-9a19cd29.js";import"./mitt-f7ef348c.js";import"./@wangeditor-231513dc.js";import"./vue-grid-layout-2853dde1.js";const K={class:"el-menu-horizontal-warp"},W=L({name:"navMenuHorizontal"}),X=L({...W,props:{menuList:{type:Array,default:()=>[]}},setup(A){const S=Q(()=>w(()=>import("./subItem-12a70be0.js"),["assets/js/subItem-12a70be0.js","assets/js/@vue-110897a1.js","assets/js/index-5e2104fc.js","assets/js/pinia-cd41b998.js","assets/js/vue-router-17193735.js","assets/js/vue-i18n-c25bb36f.js","assets/js/@intlify-d9393dcf.js","assets/js/vue-cc729cf0.js","assets/js/js-cookie-edb2da2a.js","assets/js/@element-plus-ff880098.js","assets/js/nprogress-28073a82.js","assets/css/nprogress-771398e6.css","assets/js/axios-28bc18a3.js","assets/js/element-plus-28d330eb.js","assets/js/lodash-es-21c98b27.js","assets/js/@vueuse-0a258a1c.js","assets/js/@popperjs-c75af06c.js","assets/js/@ctrl-f8748455.js","assets/js/dayjs-816b3f93.js","assets/js/async-validator-dee29e8b.js","assets/js/memoize-one-297ddbcb.js","assets/js/escape-html-72afddb3.js","assets/js/normalize-wheel-es-ed76fb12.js","assets/js/@floating-ui-432baded.js","assets/js/lodash-9a19cd29.js","assets/js/mitt-f7ef348c.js","assets/js/@wangeditor-231513dc.js","assets/css/@wangeditor-501cf061.css","assets/js/vue-grid-layout-2853dde1.js","assets/css/index-787ab40d.css"])),b=A,x=P(),R=V(),{routesList:B}=y(x),{themeConfig:d}=y(R),I=q(),c=j({defaultActive:""}),T=v(()=>b.menuList),_=o=>o.filter(t=>{var e;return!((e=t.meta)!=null&&e.isHide)}).map(t=>(t=Object.assign({},t),t.children&&(t.children=_(t.children)),t)),$=o=>{const t=o.split("/");let e={children:[]};return _(B.value).map((i,m)=>{i.path===`/${t[1]}`&&(i.k=m,e.item={...i},e.children=[{...i}],i.children&&(e.children=i.children))}),e},f=o=>{const{path:t,meta:e}=o;if(d.value.layout==="classic")c.defaultActive=`/${t==null?void 0:t.split("/")[1]}`;else{const i=e!=null&&e.isDynamic?e.isDynamicPath.split("/"):t.split("/");i.length>=4&&(e!=null&&e.isHide)?c.defaultActive=i.splice(0,3).join("/"):c.defaultActive=t}},z=o=>{H.handleOpenLink(o)};return E(()=>{f(I)}),J(o=>{f(o);let{layout:t,isClassicSplitMenu:e}=d.value;t==="classic"&&e&&M.emit("setSendClassicChildren",$(o.path))}),(o,t)=>{const e=l("SvgIcon"),i=l("el-sub-menu"),m=l("el-menu-item"),D=l("el-menu");return s(),u("div",K,[r(D,{router:"","default-active":c.defaultActive,"background-color":"transparent",mode:"horizontal"},{default:a(()=>[(s(!0),u(h,null,F(T.value,n=>(s(),u(h,null,[n.children&&n.children.length>0?(s(),k(i,{index:n.path,key:n.path},{title:a(()=>[r(e,{name:n.meta.icon},null,8,["name"]),C("span",null,p(o.$t(n.meta.title)),1)]),default:a(()=>[r(N(S),{chil:n.children},null,8,["chil"])]),_:2},1032,["index"])):(s(),k(m,{index:n.path,key:n.path},U({_:2},[!n.meta.isLink||n.meta.isLink&&n.meta.isIframe?{name:"title",fn:a(()=>[r(e,{name:n.meta.icon},null,8,["name"]),g(" "+p(o.$t(n.meta.title)),1)]),key:"0"}:{name:"title",fn:a(()=>[C("a",{class:"w100",onClick:G(Y=>z(n),["prevent"])},[r(e,{name:n.meta.icon},null,8,["name"]),g(" "+p(o.$t(n.meta.title)),1)],8,["onClick"])]),key:"1"}]),1032,["index"]))],64))),256))]),_:1},8,["default-active"])])}}});const xe=O(X,[["__scopeId","data-v-9ffb4263"]]);export{xe as default};