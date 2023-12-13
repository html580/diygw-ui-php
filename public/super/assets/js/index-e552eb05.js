import{D as k}from"./uploadinput-3a2798bf.js";import{b as x}from"./vue-router-17193735.js";import{s as y}from"./pinia-cd41b998.js";import{c as h,p as U,S as I}from"./index-5e2104fc.js";import{a as u}from"./element-plus-28d330eb.js";import{_ as R,e as C,i as N,ag as r,o as B,c as D,a as p,V as o,P as a,T as P,d as S,u as T}from"./@vue-110897a1.js";import"./@vueuse-0a258a1c.js";import"./vue-i18n-c25bb36f.js";import"./@intlify-d9393dcf.js";import"./vue-cc729cf0.js";import"./js-cookie-edb2da2a.js";import"./@element-plus-ff880098.js";import"./nprogress-28073a82.js";import"./axios-28bc18a3.js";import"./lodash-9a19cd29.js";import"./mitt-f7ef348c.js";import"./@wangeditor-231513dc.js";import"./vue-grid-layout-2853dde1.js";import"./lodash-es-21c98b27.js";import"./@popperjs-c75af06c.js";import"./@ctrl-f8748455.js";import"./dayjs-816b3f93.js";import"./async-validator-dee29e8b.js";import"./memoize-one-297ddbcb.js";import"./escape-html-72afddb3.js";import"./normalize-wheel-es-ed76fb12.js";import"./@floating-ui-432baded.js";const q={class:"container"},z={class:"el-card is-always-shadow diygw-col-24 admintable-clz"},E={class:"el-card__body"},M=p("div",{class:"current-title"},"个人中心",-1),j=p("div",{class:"clearfix"},null,-1),O=S({name:"personal"}),ve=Object.assign(O,{setup(W){const f=h(),{userInfos:s}=y(f),_=x(),e=R({loading:!1,personalForm:{nocheck:"1",id:void 0,nickname:"",password:"",newpassword:"",avatar:""},saveloading:!1,editFormRules:{nickname:[{trigger:"blur",required:!0,message:"姓名不能为空"}]}}),c=C(null),v=()=>{const d=T(c);d&&d.validate(l=>{if(l){e.saveloading=!0;let n="/sys/user/update";if(e.personalForm.password&&!e.personalForm.newpassword)return u.error("请输入新密码！"),e.saveloading=!1,!1;U(n,e.personalForm).then(()=>{u.success("修改成功"),s.value.avatar=e.personalForm.avatar,s.value.nickname=e.personalForm.nickname,I.set("userInfo",s.value),e.saveloading=!1}).finally(()=>{e.saveloading=!1})}else u.error("验证未通过！")})};return N(()=>{s.value?(e.personalForm.nickname=s.value.nickname,e.personalForm.avatar=s.value.avatar,e.personalForm.userId=s.value.userId,e.personalForm.username=s.value.userName):_.push({path:"/"})}),(d,l)=>{const n=r("el-input"),m=r("el-form-item"),i=r("el-col"),g=r("ele-Position"),w=r("el-icon"),b=r("el-button"),F=r("el-row"),V=r("el-form");return B(),D("div",q,[p("div",z,[p("div",E,[M,o(V,{ref_key:"editFormRef",ref:c,model:e.personalForm,size:"default","label-width":"200px","label-postition":"right",class:"flex flex-wrap diygw-col-16"},{default:a(()=>[o(F,{gutter:35},{default:a(()=>[o(i,{xs:24,class:"mb20"},{default:a(()=>[o(m,{label:"姓名",rules:[{required:!0,trigger:"blur",message:"姓名不能为空哟"}],prop:"nickname"},{default:a(()=>[o(n,{modelValue:e.personalForm.nickname,"onUpdate:modelValue":l[0]||(l[0]=t=>e.personalForm.nickname=t),placeholder:"请输入姓名",clearable:""},null,8,["modelValue"])]),_:1})]),_:1}),o(i,{xs:24,class:"mb20"},{default:a(()=>[o(m,{label:"原密码"},{default:a(()=>[o(n,{modelValue:e.personalForm.password,"onUpdate:modelValue":l[1]||(l[1]=t=>e.personalForm.password=t),type:"password",placeholder:"请输入密码",clearable:""},null,8,["modelValue"])]),_:1})]),_:1}),o(i,{xs:24,class:"mb20"},{default:a(()=>[o(m,{label:"新密码"},{default:a(()=>[o(n,{modelValue:e.personalForm.newpassword,"onUpdate:modelValue":l[2]||(l[2]=t=>e.personalForm.newpassword=t),type:"password",placeholder:"请输入密码",clearable:""},null,8,["modelValue"])]),_:1})]),_:1}),o(i,{xs:24,class:"mb20"},{default:a(()=>[o(m,{prop:"upload",class:"diygw-el-rate",label:"头像"},{default:a(()=>[o(k,{modelValue:e.personalForm.avatar,"onUpdate:modelValue":l[3]||(l[3]=t=>e.personalForm.avatar=t),title:"点击上传头像"},null,8,["modelValue"])]),_:1})]),_:1}),o(i,{xs:24,sm:24,md:24,lg:24,xl:24},{default:a(()=>[o(m,null,{default:a(()=>[o(b,{type:"primary",loading:e.saveloading,onClick:v},{default:a(()=>[o(w,null,{default:a(()=>[o(g)]),_:1}),P(" 更新个人信息 ")]),_:1},8,["loading"])]),_:1})]),_:1})]),_:1})]),_:1},8,["model"])])]),j])}}});export{ve as default};
